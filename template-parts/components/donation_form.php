<?php

$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

$donation_form = $field && is_array($field) ? $field : get_sub_field($field ?: 'donation_form');
$donation_form = $donation_form['donation_form'] ?? '';

if ($donation_form) :
?>
  <div class="donation-box rounded-2xl overflow-clip pb-6 bg-brand-blue -mt-[300px]">
    <div class="bg-brand-blue py-10 px-10">
      <h3 class="text-5xl leading-tight text-white font-semibold">Donation Details</h3>
    </div>
    <div class="bg-brand-light-gray rounded-b-2xl">
      <div class="p-10">
        <div class="prose xl:prose-lg prose-p:text-black max-w-none font-medium">
          <p><strong>How much do you want to donate</strong></p>
          <p>All donations directly impact our organisation and help us further our mission.</p>
          <div class="my-6 bg-gradient-to-r from-slate-500 from-20% to-transparent to-0% bg-bottom bg-[length:10px_2px] bg-repeat-x h-1"></div>
        </div>
        <div class="pt-6">
          <h4 class="text-lg font-bold mb-4">Choose your donation frequency</h4>
          <div>
            <div class="join w-full rounded-full bg-white">
              <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="frequency" aria-label="One time" checked />
              <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="frequency" aria-label="Weekly" />
              <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="frequency" aria-label="Monthly" />
              <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="frequency" aria-label="Quarterly" />
            </div>
          </div>
          <div class="my-6 bg-gradient-to-r from-slate-500 from-20% to-transparent to-0% bg-bottom bg-[length:10px_2px] bg-repeat-x h-1"></div>
          <h4 class="text-lg font-bold mb-4">Select an amount to donate</h4>
          <div>
            <div class="join w-full rounded-full bg-white">
              <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="amount" aria-label="$25" />
              <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="amount" aria-label="$50" checked />
              <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="amount" aria-label="$75" />
              <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="amount" aria-label="$100" />
            </div>
          </div>
          <input class="input w-full rounded-full mt-6" type="text" placeholder="Enter custom amount">
          <div class="my-6 bg-gradient-to-r from-slate-500 from-20% to-transparent to-0% bg-bottom bg-[length:10px_2px] bg-repeat-x h-1"></div>
          <a href="#" class="btn btn-secondary rounded-full text-xl leading-tight px-10 h-auto">Continue</a>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>