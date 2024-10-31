<?php

/**
 * Template Name: Christmas Wishes - Submit
 * Template Post Type: page
 *
 */

get_header();

?>
<div id="christmas-wishes" class="border-t">
  <div class="wishes-container flex h-[calc(100vh-185px)]">
    <div class="tree-side bg-[#fffaf3] w-2/5">
      <video class="w-full h-full object-cover" loop muted playsinline autoplay>
        <source src="<?php echo get_stylesheet_directory_uri() ?>/assets/xmas-tree.mp4" type="video/mp4" />
      </video>
    </div>
    <div class="form-side border-l bg-white flex flex-col w-3/5 h-full overflow-x-auto">
      <div id="wish-form" class="border-b">
        <div class="prose prose-p:text-[15px] max-w-none">
          <h1 class="text-4xl font-bold">Christmas Wishes</h1>
          <p>Thank you for donating to our Santa Paws appeal and helping bring comfort, care, and joy to the cats and kittens who will be spending this Christmas at our adoption shelter. Your kindness means the world to us and to the animals in our care.</p>
          <p>This Christmas, will you share a message of love and hope with cats like Bennett, Jeremy, Carrot, and Atticus? We invite you to add your name and Christmas wish below. Your heartfelt message will be displayed on our CPSV Wishing Tree, where fellow Victorian cat lovers can share in the joy of your support.</p>
          <p>From all of us at CPSV, thank you for your generosity. We wish you a Merry Christmas filled with warmth and a New Year filled with happiness</p>
          <div>
            <!-- Open the modal using ID.showModal() method -->
            <button class="btn btn-primary" onclick="wishes_form_modal.showModal()">Submit your wishes</button>
            <dialog id="wishes_form_modal" class="modal">
              <div class="modal-box">
                <?php echo FrmFormsController::get_form_shortcode(array('id' => 32)); ?>
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
        <div id="wish-cards" class="cards-container"></div>
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
    loadingIndicator.style.display = 'block'; // Show loading indicator

    try {
      // Make an AJAX call to the WordPress AJAX endpoint
      let response = await fetch('/wp-admin/admin-ajax.php?action=load_messages');
      let data = await response.json();
      const wishContainer = document.getElementById('wish-cards');
      wishContainer.innerHTML = ''; // Clear any existing content

      if (data.success) {
        // Iterate through entries and display messages
        for (const entry of Object.values(data.data)) {
          // const wish = entry.meta.wish; // Access the wish message
          // const name = entry.meta.name; // Access the wish name
          const wish = entry.content.rendered; // Access the wish message
          const name = entry.title.rendered; // Access the wish name          

          const card = document.createElement('div');
          card.className = 'card';
          //card.setAttribute('data-fancybox', 'wishes');
          //card.setAttribute('data-fancybox', '');
          // card.innerHTML = `
          //               <div class="mb-4"><div class="text-sm">${wish}</div><div class="text-sm font-semibold mt-4">${name}</div></div>
          //               <div class="mt-auto"><button class="like-button">❤️ <span class="like-count">0</span></button></div>                        
          //           `;
          card.innerHTML = `
                        <div><div class="text-sm">${wish}</div><div class="text-sm font-semibold mt-4">${name}</div></div>                     
                    `;

          // Click event for the card to open Fancybox
          card.addEventListener('click', function() {
            Fancybox.show([{
              src: `<div class="prose"><div class="prose">${wish}</div><h4 class="text-md">${name}</h4></div>`,
              type: 'html',
            }]);
          });

          wishContainer.appendChild(card);
        }
      } else {
        console.error('Error fetching wish data:', data.data); // Log the error message
      }
    } catch (error) {
      console.error('Error fetching wish data:', error); // Log any fetch errors
    } finally {
      loadingIndicator.style.display = 'none'; // Hide loading indicator
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