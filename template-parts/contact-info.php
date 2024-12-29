
<?php 
$email = get_field('email', 'option');
$phone = get_field('phone', 'option');
$address = get_field('address', 'option');
$google_map_link = get_field('google_map_link', 'option');
?>

<?php if($email || $phone || $address): ?>
<ul class="st_contact-info">
    <?php if($address && $google_map_link): ?>
        <li class="address">
            <a aria-label="Visit us on our address"  target="_blank" href="<?php echo $google_map_link ?>">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="-3 0 20 20" version="1.1">
                    <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Dribbble-Light-Preview" transform="translate(-223.000000, -5399.000000)" fill="currentColor">
                    <g transform="translate(56.000000, 160.000000)"><path d="M174,5248.219 C172.895,5248.219 172,5247.324 172,5246.219 C172,5245.114 172.895,5244.219 174,5244.219 C175.105,5244.219 176,5245.114 176,5246.219 C176,5247.324 175.105,5248.219 174,5248.219 M174,5239 C170.134,5239 167,5242.134 167,5246 C167,5249.866 174,5259 174,5259 C174,5259 181,5249.866 181,5246 C181,5242.134 177.866,5239 174,5239" "></path></g></g> </g>
                </svg>
                <span><?php echo $address ?></span>  
            </a>
        </li>	
    <?php endif ?>
    <?php if($phone): ?>
        <li class="phone">
            <a aria-label="Call us" href="tel:<?php echo $phone ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <path d="M2.00589 4.54166C1.905 3.11236 3.11531 2 4.54522 2H7.60606C8.34006 2 9.00207 2.44226 9.28438 3.1212L10.5643 6.19946C10.8761 6.94932 10.6548 7.81544 10.0218 8.32292L9.22394 8.96254C8.86788 9.24798 8.74683 9.74018 8.95794 10.1448C10.0429 12.2241 11.6464 13.9888 13.5964 15.2667C14.008 15.5364 14.5517 15.4291 14.8588 15.0445L15.6902 14.003C16.1966 13.3687 17.0609 13.147 17.8092 13.4594L20.8811 14.742C21.5587 15.0249 22 15.6883 22 16.4238V19.5C22 20.9329 20.8489 22.0955 19.4226 21.9941C10.3021 21.3452 2.65247 13.7017 2.00589 4.54166Z" fill="currentColor"/>
                </svg>
                <span><?php echo $phone ?></span>
            </a>
        </li>
    <?php endif ?>
    <?php if($email): ?>
        <li class="email">
            <a aria-label="Send us an email" href="mailto:<?php echo $email; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" width="20" height="20" viewBox="0 0 46.572 31.609" xml:space="preserve"><g>
                    <polygon points="46.573,23.807 46.573,6.29 34.923,15.98  "/>
                    <polygon points="0,6.294 0,23.802 11.648,15.98  "/>
                    <path d="M27.589,22.08c-1.158,0.963-2.684,1.489-4.305,1.489c-1.616,0-3.147-0.526-4.301-1.489l-5.193-4.322L0,27.017v3.261   c0,0.738,0.601,1.332,1.347,1.332h43.879c0.741,0,1.347-0.594,1.347-1.332v-3.257l-13.789-9.263L27.589,22.08z"/>
                    <path d="M45.226,0H1.347C0.601,0,0,0.594,0,1.33v1.487l20.717,17.227c0.663,0.548,1.597,0.863,2.567,0.863   c0.97,0,1.906-0.315,2.566-0.863L46.573,2.813V1.33C46.573,0.594,45.967,0,45.226,0z"/></g>
                </svg>
                <span><?php echo $email ?></span>
            </a>
        </li>
    <?php endif ?>
</ul>
<?php endif ?>

