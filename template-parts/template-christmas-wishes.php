<?php

/**
 * Template Name: Christmas Wishes
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
          <p>This Christmas, we are encouraging Victorian cat lovers to share a message of love and hope with the hundreds of cats and kittens who will sadly find themselves at our adoption shelter. Instead of waking up on Christmas morning to cuddles, pats, and toys, many of these precious animals will be feeling lonely, afraid, and unsure of what the future holds.</p>
          <p>But you can help.</p>
          <p>When you make a tax-deductible donation to our Santa Paws appeal, you'll have the opportunity to write your own heartfelt message to a cat or kitten spending Christmas at our shelter.</p>
          <p>Simply click on the 'Donate Now' button, and once your donation is processed, you'll be directed to a page where you can share your wish.</p>
          <p>From all of us at CPSV, thank you for being a paw-some friend to Victorian cats in need this Christmas. Your kindness will bring comfort and hope during this special time.</p>
          <p>Wishing you a Merry Christmas and a happy, healthy New Year!</p>
          <div>
            <a href="#" class="btn btn-primary text-white no-underline">Donate Now</a>
          </div>
        </div>
      </div>
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