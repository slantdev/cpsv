<style>
  /*
    Use this CSS styles to manage the position of the DropIn component.
    */
  .npspPlusDonateDropIn {
    position: absolute;
    top: 100px;
    left: 100px;
    width: 500px;
  }
</style>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cpsv.my.salesforce-sites.com/resource/npsp_plus__DonateDropIn/dropin.js"></script>
<script>
  npspPlusDropIn.create({
    donateFormURL: 'https: //cpsv.my.salesforce-sites.com/npsp_plus__DonateDropIn?form=a0rOa00000Fnk98IAB',
    //containerSelector: '',                      // CSS selector of the HTML element the drop-in iFrame will be appended (body tag by default).
    //iFrameOptions: {
    //    id: 'npspPlusDonateDropIn',       // HTML id of the DropIn iFrame element
    //    className: 'npspPlusDonateDropIn' // HTML class name of the DropIn iFrame element.
    //}
  })
</script>