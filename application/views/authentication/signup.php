<!-- Sign up! -->
              
                <?php
                    echo form_open('authentication/signup_validation', array('class' => 'signupForm'));
                    echo validation_errors();

                    echo "<div class='form-group'>";
                    echo form_input(array(
                        'name' => 'name',
                        'class' => 'form-control',
                        'width' => '100px',
                        'placeholder' => lang('signup_name_bg')
                        ));
                    echo "</div>";

                    echo "<div class='form-group'>";
                    echo form_input(array(
                        'name' => 'email',
                        'class' => 'form-control',
                        'width' => '100px',
                        'placeholder' => lang('signup_email_bg')
                        ));
                    echo "</div>";

                    echo "<div class='form-group'>";
                    echo form_password(array(
                        'name' => 'password',
                        'class' => 'form-control',
                        'placeholder' => lang('signup_pass_bg')
                        ));
                    echo "</div>";

                    echo "<div class='form-group'><p class='font-small-print'>* Your request will be reviewed and approved by an administrator.</p>";
                    echo form_submit(
                        array(
                        'name' => 'signup_submit',
                        'value' => lang('signup_submit_btn'),
                        'class' => 'btn btn-primary',
                        'width' => '100px'
                        ));
               
                    echo "</div>";

                    echo form_close();
                ?>