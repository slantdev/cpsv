<?php

/**
 * Template Name: Christmas Wishes
 * Template Post Type: page
 *
 */

get_header();

?>
<div id="christmas-wishes" class="border-t">
  <div class="wishes-container">
    <div class="tree-side">
      <div class="w-full h-full">
        <div class="aspect-w-9 aspect-h-16">
          <video loop muted playsinline autoplay>
            <source src="<?php echo get_stylesheet_directory_uri() ?>/assets/xmas-tree.mp4" type="video/mp4" />
          </video>
        </div>
      </div>
    </div>
    <div class="form-side border-l">
      <div id="wish-form" class="border-b flex justify-between items-center">
        <div>
          <h1 class="text-4xl font-bold">Christmas Wishes</h1>
        </div>
        <div>
          <a class="btn btn-primary" href="#">Donate Now</a>
        </div>
      </div>
      <div class="success-message mt-6 px-6" style="display: none;">
        <div role=" alert" class="alert alert-success rounded-md bg-green-300">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 shrink-0 stroke-current"
            fill="none"
            viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>Thank you! Your request has been submitted and is now pending review.<br />It will be displayed once approved.</span>
          <button class="close-alert">
            <?php echo cpsv_icon(array('icon' => 'close', 'group' => 'utilities', 'size' => '20', 'class' => 'w-5 h-5')); ?>
          </button>
        </div>
      </div>
      <div class="wish-cards-container">
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
    if (successMessageElement) {
      successMessageElement.style.display = 'block';

      // Automatically hide the message after 10 seconds
      setTimeout(() => {
        successMessageElement.style.display = 'none';
        removeSuccessParams();
      }, 10000); // 10000 milliseconds = 10 seconds
    }
  }

  // Add event listener to the close button
  const closeButton = document.querySelector('.close-alert');
  if (closeButton) {
    closeButton.addEventListener('click', function() {
      const successMessageElement = document.querySelector('.success-message');
      if (successMessageElement) {
        successMessageElement.style.display = 'none';
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