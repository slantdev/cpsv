<?php

/**
 * Template Name: Volunteer Discussion - Submit
 * Template Post Type: page
 *
 */

get_header();

?>
<div id="volunteer-discussions" class="border-t">
  <div class="discussions-container max-w-screen-md mx-auto">
    <div class="form-side bg-white flex flex-col h-full overflow-x-auto">
      <div id="discussion-form" class="p-6 2xl:p-8 flex justify-end">
        <button class="btn btn-primary" onclick="discussion_form_modal.showModal()">Create a Discussion</button>
        <dialog id="discussion_form_modal" class="modal">
          <div class="modal-box overflow-x-hidden">
            <?php /* echo FrmFormsController::get_form_shortcode(array('id' => 4)); */ ?>
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
  document.addEventListener('DOMContentLoaded', () => {
    loadMessages(); // Load messages on page load
  });

  async function loadMessages() {
    const loadingIndicator = document.getElementById('loading-indicator');
    loadingIndicator.style.display = 'block';

    try {
      let response = await fetch('/staging/wp-admin/admin-ajax.php?action=load_volunteer_messages');
      let data = await response.json();
      const discussionContainer = document.getElementById('discussion-cards');
      discussionContainer.innerHTML = '';

      if (data.success) {
        for (const entry of Object.values(data.data)) {
          const question = entry.content.rendered;
          const name = entry.title.rendered;
          const comments = entry.comments || [];
          // Assuming `entry.date` holds the post date in a format that can be parsed as a Date object.
          const postDate = new Date(entry.date); // Parse the post date
          const relativeTime = formatRelativeTime(postDate); // Use the existing function
          const commentCount = comments.length; // Number of comments for the post
          const card = document.createElement('div');
          // card.innerHTML = `
          //           <div class="card" data-entry-id="${entry.id}">
          //               <div class="text-sm">${question}</div>
          //               <div class="text-sm font-semibold mt-4">${name}</div>
          //               <div id="comments-${entry.id}" class="comments"></div>
          //           </div>
          //       `;          
          card.innerHTML = `
                    <div class="card" data-entry-id="${entry.id}">
                        <div class="text-sm mb-4"><span class="font-semibold">${name}</span>&nbsp;&nbsp;&middot;&nbsp;&nbsp;<span class="text-xs text-slate-500">${relativeTime}</span></div>                    
                        <div class="text-sm">${question}</div>
                        <div class="mt-4">
                          <span class="text-sm text-slate-500">${commentCount} comment${commentCount !== 1 ? 's' : ''}</span>
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
                          <div class="absolute right-4 top-4 hidden">
                            <button class="reply-btn text-xs text-slate-400 hover:text-slate-700" data-comment-id="${comment.id}">Reply</button>
                          </div>
                          <div class="nested-comments"></div> <!-- Placeholder for replies -->
                        </div>
                      `).join('')}
                    </div>
                  </div>
                ` : ''} <!-- If no comments, render nothing -->
              </div>
            `;


            Fancybox.show([{
              src: modalContent,
              type: 'html'
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
                        //alert('Comment submitted successfully!');
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
                console.error(`Form with ID comment-form-${entry.id} not found.`);
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

      // Get the comment ID from the Reply button's data attribute
      const commentId = replyButton.dataset.commentId;

      // Get the post ID from the parent card
      const cardElement = replyButton.closest('.card');
      const entryId = cardElement ? cardElement.dataset.entryId : null;

      if (!entryId) {
        console.error('Post ID (entryId) not found for the reply.');
        return;
      }

      // Build the reply form dynamically
      const replyForm = `
            <form id="reply-form-${commentId}" class="comment-form" method="POST" action="/wp-comments-post.php">
                <input type="text" name="author" placeholder="Your Name" required>
                <textarea name="comment" placeholder="Add a reply..." required></textarea>
                <input type="hidden" name="comment_post_ID" value="${entryId}">
                <input type="hidden" name="comment_parent" value="${commentId}">
                <button type="submit">Reply</button>
            </form>
        `;

      const commentElement = replyButton.closest(`.comment[data-id="${commentId}"]`);
      if (!commentElement) {
        console.error('Comment element not found for the reply.');
        return;
      }

      // Append the reply form below the comment, if not already added
      if (!commentElement.querySelector(`#reply-form-${commentId}`)) {
        commentElement.insertAdjacentHTML('beforeend', replyForm);

        // Add an event listener for the reply form submission
        const form = document.getElementById(`reply-form-${commentId}`);
        form.addEventListener('submit', async (e) => {
          e.preventDefault();
          const formData = new FormData(form);

          try {
            const response = await fetch('/wp-comments-post.php', {
              method: 'POST',
              body: formData,
            });

            if (response.ok) {
              const newCommentId = await response.text(); // Expecting comment ID from server
              const newCommentHTML = `
                            <div class="comment" data-id="${newCommentId}">
                                <p><strong>${formData.get('author')}</strong>: ${formData.get('comment')}</p>
                                <small>Just now</small>
                            </div>
                        `;
              const nestedComments = commentElement.querySelector('.nested-comments');
              nestedComments.innerHTML += newCommentHTML; // Append the new reply under the parent comment
              form.remove(); // Remove the reply form after submission
              alert('Reply submitted successfully!');
            } else {
              alert('Error submitting reply.');
            }
          } catch (error) {
            console.error('An error occurred:', error);
            alert('Network error. Please try again.');
          }
        });
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

  // Function to close success message modal
  function commentCloseSuccessModal() {
    const commentSuccessModal = document.getElementById('comment_success_message_modal');
    if (commentSuccessModal) {
      commentSuccessModal.close();
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
    const successMessageElement = document.querySelector('.success-message');
    success_message_modal.showModal();
  }

  // Add event listener to the close button
  const closeButton = document.querySelector('.close-success');
  if (closeButton) {
    closeButton.addEventListener('click', function() {
      const successMessageElement = document.getElementById('success_message_modal');
      if (successMessageElement) {
        success_message_modal.close();
      }
      // Remove the success parameter from the URL
      removeSuccessParams();
    });
  }

  // Function to remove the 'success' parameter from the URL
  function removeSuccessParams() {
    const url = new URL(window.location.href);
    url.searchParams.delete('success'); // Remove the 'success' parameter
    window.history.replaceState({}, document.title, url.toString()); // Update the URL without reloading
  }
</script>


</main>

</div>

</div>

<?php wp_footer(); ?>

</body>

</html>