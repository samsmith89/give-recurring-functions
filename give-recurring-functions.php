<?php
/*
 * Plugin Name: Give Recurring Functions
 * Plugin URI:
 * Description: This plugin provides additional functionality to Give Recurring addon.
 * Version: 1.0
 * Author: Sam Smith
 * Author URI: gsamsmith.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * DISCLAIMER: This is provided as a solution for providing additional functionality to the Give Recurring plugin with the current markup and version of the Give plugin (version 2.5.10) and Give Recurring addon (version 1.9.7). We provide no
 * guarantees to any updates that Give may make to their plugin and we do not offer Support for this code at all. For more information please reference the custom development agreement that was agreed to and signed by both parties.
 *
 */


// DRY on this one
// Displays custom tshirt field if the donation amount is $240 one-time or $20 monthly
function give_display_tshirt()
{ ?>
    <script>
        //Grabbing the custom field
        const y = document.querySelector("#tshirt_size-wrap");
        const donLevels = document.querySelectorAll('.give-donation-level-btn');
        const recurWrap = document.querySelector(".give-recurring-donors-choice");
        //Hides and shows the t-shirt field

        function giveToggleShirt() {
            // Grabbing donation amount
            const donValue = document.querySelector("#give-amount").value;
            // Is Recurring checked
            const donRecur = document.querySelector("#_give_is_donation_recurring").value;


            // Conditionals on donation amount and if recurring is checked
            if ((donValue == 240.00) && (donRecur == 0)) {

                // Conditional to see the display state of the Tshirt field
                function toggleShirt() {

                    if ((y.style.display == "") || (y.style.display == "none")) {
                        y.style.display = "block";

                    }
                };
                toggleShirt();

            } else if ((donValue == 20.00) && (donRecur == 1)) {

                function toggleShirt() {

                    // Conditional to see the display state of the Tshirt field and recurring is selected
                    if ((y.style.display == "") || (y.style.display == "none")) {
                        y.style.display = "block";

                    }
                };
                toggleShirt();

            } else {
                // If nothing fits then hide it
                y.style.display = "none";

            };
        }

        if ((donLevels != null) && (y != null)) {
            // Grab all the donation level buttons
            document.querySelectorAll('.give-donation-level-btn').forEach(item => {
                // Running the loop on the Donation Buttons
                item.addEventListener('click', event => {

                    // Set timeout for amount to populate
                    setTimeout(function() {
                        // Run the t-shirt function
                        giveToggleShirt();

                    }, 500);

                })
            })
        }

        if ((donLevels != null) && (y != null)) {
            // Grabbing the recurring selection wrap

            if (recurWrap != null) {
                recurWrap.addEventListener('click', event => {

                    setTimeout(function() {
                        // Run the t-shirt function
                        giveToggleShirt();

                    }, 500);

                })
            }
        }
    </script>
<?php }

add_action('give_post_form_output', 'give_display_tshirt');
