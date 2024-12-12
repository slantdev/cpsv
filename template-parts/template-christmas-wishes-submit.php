<?php

/**
 * Template Name: Christmas Wishes - Submit
 * Template Post Type: page
 *
 */

get_header();

?>
<div id="christmas-wishes" class="border-t">
  <div class="wishes-container lg:flex lg:h-[calc(100vh-85px)] xl:h-[calc(100vh-177px)]">
    <div class="tree-side bg-[#c70117] lg:w-1/3">
      <video class="w-full h-full object-cover" loop muted playsinline autoplay>
        <source src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/campaign/CPSV-Christmas-Campaign.mp4" type="video/mp4" />
      </video>
    </div>
    <div class="form-side bg-white flex flex-col lg:w-2/3 h-full overflow-x-auto">
      <div id="wish-form" class="border-b">
        <!-- <div><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/campaign/SDG-Cat-Protection-Web-Banner-2024.jpg" alt="CPSV Banner"></div> -->
        <div class="p-6 2xl:p-8">
          <!-- <div class="prose prose-p:text-[15px] max-w-none">
            <h1 class="text-4xl font-bold">Share your Christmas wishes</h1>
            <p>Thank you for donating to our Santa Paws appeal and helping bring comfort, care, and joy to the cats and kittens who will be spending this Christmas at our adoption shelter. Your kindness means the world to us and to the animals in our care.</p>
            <p>This Christmas, will you share a message of love and hope with cats like Bennett, Jeremy, Carrot, and Atticus? We invite you to add your name and Christmas wish below. Your heartfelt message will be displayed on our CPSV Wishing Tree, where fellow Victorian cat lovers can share in the joy of your support.</p>
            <p>From all of us at CPSV, thank you for your generosity. We wish you a Merry Christmas filled with warmth and a New Year filled with happiness</p>
            <div> -->
          <!-- Open the modal using ID.showModal() method -->
          <button class="btn btn-primary" onclick="wishes_form_modal.showModal()">Submit your wishes</button>
          <dialog id="wishes_form_modal" class="modal">
            <div class="modal-box overflow-x-hidden">
              <?php echo FrmFormsController::get_form_shortcode(array('id' => 3)); ?>
            </div>
            <form method="dialog" class="modal-backdrop">
              <button>close</button>
            </form>
          </dialog>
        </div>
      </div>
    </div>
  </div>
  <dialog id="success_message_modal" class="modal">
    <div class="modal-box">
      <div class="prose max-w-none">
        <p>Thank you for leaving a message of love and hope for the cats and kittens who will find themselves at our adoption shelter this Christmas. Your message has been sent to our CPSV team for review and approval, and it will be posted to our CPSV Wishing Tree page within 24 hours.</p>
        <p>Thank you again for being a PAW-some supporter for Victorian cats in need this Christmas.</p>
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
  <div class="wish-cards-container bg-[#fffaf3]">
    <div id="loading-indicator" class="text-center p-6 mt-5" style="display:none;"><span class="loading loading-spinner text-info w-8"></span></div>
    <div id="wish-cards" class="cards-container p-6 grid grid-cols-1 md:grid-cols-2 gap-5 overflow-y-auto xl:grid-cols-3 2xl:p-8"></div>
  </div>
</div>
</div>
</div>

<script type="module">
  document.addEventListener('DOMContentLoaded', () => {
    loadMessages(); // Load messages on page load
  });

  async function loadMessages() {
    const loadingIndicator = document.getElementById('loading-indicator');
    loadingIndicator.style.display = 'block';

    try {
      let response = await fetch('/wp-admin/admin-ajax.php?action=load_messages');
      let data = await response.json();
      const wishContainer = document.getElementById('wish-cards');
      wishContainer.innerHTML = '';

      if (data.success) {
        for (const entry of Object.values(data.data)) {
          const wish = entry.content.rendered;
          const name = entry.title.rendered;
          const comments = entry.comments || [];

          const card = document.createElement('div');
          //card.className = 'card';
          card.innerHTML = `
                    <div class="card" data-entry-id="${entry.id}">
                        <div class="text-sm">${wish}</div>
                        <div class="text-sm font-semibold mt-4">${name}</div>
                        <div id="comments-${entry.id}" class="comments"></div>
                    </div>
                `;

          card.addEventListener('click', function() {
            const modalContent = `
            <div>
                <div class="prose">
                    <h4>${name}</h4>
                    <div>${wish}</div>
                </div>
                <div class="border-t border-slate-300 pt-6">
                    <h5 class="font-semibold mb-4">Comments</h5>
                    <div id="comments-${entry.id}" class="comments flex flex-col gap-y-4">
                        ${comments.map(comment => `
                            <div class="comment border border-slate-300 rounded p-5" data-id="${comment.id}">
                                <div class="mb-2"><strong>${comment.author}</strong> <small>${comment.date}</small></div>
                                <div>${comment.content}</div>
                                <div class="pt-4 flex justify-end">                                
                                <button class="reply-btn text-sm" data-comment-id="${comment.id}">Reply</button>
                                </div>
                                <div class="nested-comments"></div> <!-- Placeholder for replies -->
                            </div>
                        `).join('')}
                    </div>
                    <div class="mt-6 pt-6 border-t border-slate-300">
                    <h5 class="font-semibold mb-4">Leave a Comment</h5>
                    <form id="comment-form-${entry.id}" class="comment-form" method="POST" action="/wp-comments-post.php">
                      <div class="flex gap-4">
                        <input type="text" class="w-full border border-slate-300 rounded" name="author" placeholder="Your Name" required>
                        <input type="email" class="w-full border border-slate-300 rounded" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="mt-4 mb-4">
                        <textarea name="comment" class="w-full border-slate-300 rounded" placeholder="Add a comment..." required></textarea>
                        </div>
                        <input type="hidden" name="comment_post_ID" value="${entry.id}">
                        <input type="hidden" name="comment_parent" value="0">
                        <?php echo wp_nonce_field('comment_form', '_wpnonce', true, false); ?>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                    </div>
                </div>
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
                    const response = await fetch('/wp-admin/admin-ajax.php', {
                      method: 'POST',
                      body: formData,
                    });

                    if (response.ok) {
                      const result = await response.json();
                      if (result.success) {
                        const commentId = result.data.comment_ID; // Assume WordPress returns the comment ID
                        const commentContainer = document.getElementById(`comments-${entry.id}`);
                        const newCommentHTML = `
                    <div class="comment" data-id="${commentId}">
                        <p><strong>${formData.get('author')}</strong>: ${formData.get('comment')}</p>
                        <small>Just now</small>
                    </div>
                `;
                        commentContainer.innerHTML += newCommentHTML; // Append the comment
                        form.reset();
                        alert('Comment submitted successfully!');
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



          wishContainer.appendChild(card);
        }
      } else {
        console.error('Error fetching wish data:', data.data);
      }
    } catch (error) {
      console.error('Error fetching wish data:', error);
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
                <input type="email" name="email" placeholder="Your Email" required>
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


<style>
  .fancybox__slide .fancybox__content {
    max-width: 600px;
    border-radius: 16px;
  }

  .f-button:focus-visible {
    box-shadow: none;
  }
</style>


</main>

</div>

</div>

<?php wp_footer(); ?>

</body>

</html>