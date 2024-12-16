<?php

// Add this in your theme's functions.php or a custom plugin file
function volunteer_discussions_shortcode()
{
  ob_start(); // Start output buffering
?>

  <div id="volunteer-discussions">
    <div class="discussions-container max-w-screen-md mx-auto">
      <div class="form-side bg-white flex flex-col h-full overflow-x-auto">
        <div id="discussion-form" class="p-6 2xl:p-8 flex justify-end">
          <button class="btn btn-primary" onclick="discussion_form_modal.showModal()">Create a Discussion</button>
          <dialog id="discussion_form_modal" class="modal">
            <div class="modal-box overflow-x-hidden">
              <?php echo FrmFormsController::get_form_shortcode(array('id' => 37)); ?>
            </div>
            <form method="dialog" class="modal-backdrop">
              <button>close</button>
            </form>
          </dialog>
        </div>
      </div>
    </div>
    <dialog id="success_message_modal" class="modal">
      <div class="modal-box">
        <div class="prose max-w-none">
          <p>Your question has been posted successfully</p>
        </div>
        <div class="modal-action">
          <form method="dialog">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn close-success">Close</button>
          </form>
        </div>
      </div>
      <form method="dialog" class="modal-backdrop">
        <button class="close-success">close</button>
      </form>
    </dialog>
    <div class="discussion-cards-container max-w-screen-md mx-auto">
      <div id="loading-indicator" class="text-center p-6 mt-5" style="display:none;"><span class="loading loading-spinner text-info w-8"></span></div>
      <div id="discussion-cards" class="cards-container p-6 grid grid-cols-1 gap-5 overflow-y-auto 2xl:p-8"></div>
    </div>
    <dialog id="comment_success_message_modal" class="modal">
      <div class="modal-box">
        <div class="prose max-w-none">
          <p>Your comment has been posted successfully</p>
        </div>
        <div class="modal-action">
          <form method="dialog">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn close-success" onclick="closeSuccessModal()">Close</button>
          </form>
        </div>
      </div>
      <form method="dialog" class="modal-backdrop">
        <button class="close-success">close</button>
      </form>
    </dialog>
  </div>

  <script type="module">
    jQuery(document).ready(function($) {
      $(document).on('frmFormComplete', function(event, form, response) {
        var formID = $(form).find('input[name="form_id"]').val();
        console.log(formID);
        if (formID == '37') {
          loadMessages();
        }
      });
    });

    document.addEventListener('DOMContentLoaded', () => {
      loadMessages(); // Load messages on page load
    });

    async function loadMessages() {
      const loadingIndicator = document.getElementById('loading-indicator');
      loadingIndicator.style.display = 'block';

      try {
        //let response = await fetch('/wp-admin/admin-ajax.php?action=load_volunteer_messages');
        let response = await fetch('/staging/wp-admin/admin-ajax.php?action=load_volunteer_messages');
        let data = await response.json();
        const discussionContainer = document.getElementById('discussion-cards');
        discussionContainer.innerHTML = '';

        if (data.success) {
          for (const entry of Object.values(data.data)) {
            const question = entry.content.rendered;
            const name = entry.title.rendered;
            const comments = entry.comments || [];
            const postDate = new Date(entry.date);
            const relativeTime = formatRelativeTime(postDate);
            const commentCount = comments.length;
            const card = document.createElement('div');
            card.innerHTML = `
                        <div class="card" data-entry-id="${entry.id}">
                          <div class="not-prose text-left">
                            <div class="text-sm mb-4"><span class="font-semibold">${name}</span>&nbsp;&nbsp;&middot;&nbsp;&nbsp;<span class="text-xs text-slate-500">${relativeTime}</span></div>                    
                            <div class="text-sm">${question}</div>
                            <div class="mt-4">
                              <span class="text-sm text-slate-500">${commentCount} comment${commentCount !== 1 ? 's' : ''}</span>
                            </div>
                          </div>
                        </div>
                    `;

            card.addEventListener('click', function() {
              const modalContent = `
                  <div>
                    <div class="prose">
                      <div><span class="text-xl font-semibold">${name}</span>&nbsp;&nbsp;&middot;&nbsp;&nbsp;<span class="text-xs text-slate-500">${relativeTime}</span></div>
                      <div class="text-slate-600">${question}</div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-slate-300">
                      <h5 class="font-semibold mb-4">Join the discussion</h5>
                      <form id="comment-form-${entry.id}" class="comment-form" method="POST" action="/wp-comments-post.php">
                        <div class="flex gap-4">
                          <input type="text" class="w-full border border-slate-300 rounded" name="author" placeholder="Your Name" required>
                        </div>
                        <div class="mt-4 mb-4">
                          <textarea name="comment" class="w-full border-slate-300 rounded" placeholder="Add a comment..." required></textarea>
                        </div>
                        <input type="hidden" name="comment_post_ID" value="${entry.id}">
                        <input type="hidden" name="comment_parent" value="0">
                        <?php echo wp_nonce_field('comment_form', '_wpnonce', true, false); ?>
                        <div class="flex justify-end">
                          <button class="btn btn-primary" type="submit">Post Comment</button>
                        </div>
                      </form>
                    </div>

                    ${comments.length > 0 ? `
                      <div class="mt-6">
                        <div class="border-b border-slate-300 pb-4 mb-4">
                          <h5 class="font-semibold">Comments</h5>
                        </div>
                        <div id="comments-${entry.id}" class="comments flex flex-col gap-y-4">
                          ${comments.map(comment => `
                            <div class="comment border border-slate-300 rounded p-4 relative" data-id="${comment.id}">
                              <div class="mb-2"><strong>${comment.author}</strong>&nbsp;&nbsp;<small class="text-slate-500">${formatRelativeTime(comment.date)}</small></div>
                              <div class="text-sm text-slate-600">${comment.content}</div>
                              <div class="absolute right-4 top-4">
                                <button class="reply-btn text-xs text-slate-400 hover:text-slate-700 hidden" data-entry-id="${entry.id}" data-comment-id="${comment.id}">Reply</button>
                              </div>
                              <div class="nested-comments" id="nested-comments-${comment.id}"></div> <!-- Placeholder for replies -->
                            </div>
                          `).join('')}
                        </div>
                      </div>
                    ` : ''}
                  </div>
                `;

              Fancybox.show([{
                src: modalContent,
                type: 'html',
              }]);

              // Wait for Fancybox to render modal content before adding the event listener
              setTimeout(() => {
                const form = document.getElementById(`comment-form-${entry.id}`);
                if (form) {
                  form.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const formData = new FormData(form);
                    formData.append('action', 'comment_post'); // Specify the action for WordPress AJAX

                    try {
                      //const response = await fetch('/wp-admin/admin-ajax.php', {
                      const response = await fetch('/staging/wp-admin/admin-ajax.php', {
                        method: 'POST',
                        body: formData,
                      });

                      if (response.ok) {
                        const result = await response.json();
                        if (result.success) {
                          form.reset();
                          // Close the previous modal
                          Fancybox.close();
                          // Show the success message modal
                          const successModal = document.getElementById('comment_success_message_modal');
                          successModal.showModal();

                          // Refresh the posts section
                          loadMessages();
                        } else {
                          alert('Failed to submit the comment. ' + result.data);
                        }
                      } else {
                        console.error('Failed to submit the comment:', response.statusText);
                        alert('Error submitting comment. Please try again.');
                      }
                    } catch (error) {
                      console.error('An error occurred:', error);
                      alert('Error submitting comment. Please check your network connection.');
                    }
                  });

                } else {
                  console.error(`Form with ID comment
                    // with ID comment-form-${entry.id} not found.`);
                }
              }, 100); // Delay to ensure modal content is rendered

            });

            discussionContainer.appendChild(card);
          }
        } else {
          console.error('Error fetching discussion data:', data.data);
        }
      } catch (error) {
        console.error('Error fetching discussion data:', error);
      } finally {
        loadingIndicator.style.display = 'none';
      }
    }

    document.addEventListener('click', (e) => {
      if (e.target.classList.contains('reply-btn')) {
        const replyButton = e.target;
        const commentId = replyButton.dataset.commentId;
        const entryId = replyButton.dataset.entryId;

        // Build and insert the reply form
        const replyForm = `
            <form id="reply-form-${commentId}" class="reply-form mt-4" method="POST">
              <input type="text" class="border border-slate-300 rounded w-full mb-2" name="author" placeholder="Your Name" required>
              <input type="email" class="border border-slate-300 rounded w-full mb-2" name="email" placeholder="Your Email" required>
              <textarea name="comment" class="border border-slate-300 rounded w-full" placeholder="Add a reply..." required></textarea>
              <input type="hidden" name="comment_post_ID" value="${entryId}">
              <input type="hidden" name="comment_parent" value="${commentId}">
              ${document.getElementById('comment_form_nonce').outerHTML} <!-- Include nonce here -->
              <button type="submit" class="btn btn-primary mt-2">Post Reply</button>
            </form>
          `;

        // Append the reply form to the nested comments container
        const nestedCommentsContainer = document.getElementById(`nested-comments-${commentId}`);
        nestedCommentsContainer.innerHTML = replyForm; // Clear existing nested forms
        replyButton.setAttribute('disabled', 'true'); // Optional: Disable the reply button
      }
    });

    document.addEventListener('submit', async (e) => {
      if (e.target.matches('.reply-form')) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        formData.append('action', 'comment_post'); // Specify the action for WordPress AJAX

        try {
          //const response = await fetch('/wp-admin/admin-ajax.php', {
          const response = await fetch('/staging/wp-admin/admin-ajax.php', {
            method: 'POST',
            body: formData,
          });

          if (response.ok) {
            const result = await response.json();
            if (result.success) {
              // Create new reply HTML
              const newCommentHTML = `
                  <div class="comment border border-slate-300 rounded p-4 mb-4" data-id="${result.data.comment_ID}">
                    <div class="mb-2">
                      <strong>${formData.get('author')}</strong>&nbsp;&nbsp;<small class="text-slate-500">Just now</small>
                    </div>
                    <div class="text-sm text-slate-600">${formData.get('comment')}</div>
                  </div>
                `;
              // Append the new reply to the nested comments section
              const nestedCommentsContainer = document.getElementById(`nested-comments-${formData.get('comment_parent')}`);
              nestedCommentsContainer.innerHTML += newCommentHTML; // Append the new reply

              // Reset and re-enable the reply button
              form.reset();
              const replyButton = document.querySelector(`.reply-btn[data-comment-id="${formData.get('comment_parent')}"]`);
              if (replyButton) {
                replyButton.removeAttribute('disabled');
              }
            } else {
              alert('Failed to submit the reply. ' + result.data);
            }
          } else {
            console.error('Failed to submit the reply:', response.statusText);
            alert('Error submitting reply. Please try again.');
          }
        } catch (error) {
          console.error('An error occurred:', error);
          alert('Error submitting reply. Please check your network connection.');
        }
      }
    });

    function formatRelativeTime(dateString) {
      const now = new Date();
      const date = new Date(dateString);
      const diffInSeconds = Math.floor((now - date) / 1000);
      const diffInDays = Math.floor(diffInSeconds / 86400);
      const diffInMonths = Math.floor(diffInDays / 30.44); // Average days in a month
      const diffInYears = Math.floor(diffInDays / 365.25); // Account for leap years

      if (diffInYears > 0) {
        return diffInYears === 1 ? "1 year ago" : `${diffInYears} years ago`;
      } else if (diffInMonths > 0) {
        return diffInMonths === 1 ? "1 month ago" : `${diffInMonths} months ago`;
      } else if (diffInDays > 0) {
        return diffInDays === 1 ? "1 day ago" : `${diffInDays} days ago`;
      } else {
        return "Today";
      }
    }
  </script>

  <script>
    function getParameterByName(name, url = window.location.href) {
      name = name.replace(/[\[\]]/g, '\\$&');
      const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Check if the "success" parameter is true
    const success = getParameterByName('success');

    if (success === 'true') {

      const discussionFormModal = document.getElementById('discussion_form_modal');
      discussionFormModal.close();

      const successMessageElement = document.getElementById('success_message_modal');

      if (successMessageElement) {
        successMessageElement.showModal(); // Show the modal
      }
    }

    // Add event listener to the dialog for the close button
    const successMessageModal = document.getElementById('success_message_modal');
    if (successMessageModal) {
      successMessageModal.addEventListener('click', function(event) {
        // Check if the click was on the close button
        if (event.target.classList.contains('close-success')) {
          console.log('Close button clicked');
          successMessageModal.close(); // Close modal
          removeSuccessParams(); // Remove the success parameter from the URL
        }
      });
    }

    // Function to remove the 'success' parameter from the URL
    function removeSuccessParams() {
      console.log('Removing success parameter');
      const url = new URL(window.location.href);
      url.searchParams.delete('success'); // Remove the 'success' parameter
      window.history.replaceState({}, document.title, url.toString()); // Update the URL without reloading
    }
  </script>

<?php
  return ob_get_clean(); // Return the buffered content
}

// Register the shortcode
add_shortcode('volunteer_discussions', 'volunteer_discussions_shortcode');

function volunteer_discussions_body_class($classes)
{
  $classes[] = 'volunteer_discussions_page';
  return $classes;
}

add_filter('body_class', 'volunteer_discussions_body_class');
