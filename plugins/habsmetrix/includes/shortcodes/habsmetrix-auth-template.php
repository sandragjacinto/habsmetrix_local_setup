NONCE_FIELD_PH

<div class="columns">
    <div class="column is-one-third nobottommargin">

        <div class="box has-background-black-ter">

        <div id="login-status"></div>

            <form id="login-form" name="login-form" class="form" action="#" method="post">

                <h4 class="title is-4 has-text-white">Login to your Account</h4>

                <div class="field">
                    <label class="label has-text-white" for="login-form-username">Username:</label>
                    <div class="control">
                        <input type="text" id="login-form-username" name="login-form-username" value="" class="input" />
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-white" for="login-form-password">Password:</label>
                    <div class="control">
                        <input type="password" id="login-form-password" name="login-form-password" value="" class="input" />
                    </div>
                </div>

               <div class="field">
                <button class="button is-link" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                </div>

            </form>
        </div>

    </div>

    <div class="column is-two-thirds nobottommargin">

        <div class="box has-background-grey">

        <h4 class="title is-4 has-text-white">Don't have an Account? Register Now.</h4>

        <div id="register-status"></div>

        <form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">

            <div class="field">
                <label class="label has-text-white" for="register-form-name">Name:</label>
                <div class="control">
                <input type="text" id="register-form-name" name="register-form-name" value="" class="input" />
                </div>
            </div>

            <div class="field col_last">
                <label class="label has-text-white" for="register-form-email">Email Address:</label>
                <div class="control">
                <input type="text" id="register-form-email" name="register-form-email" value="" class="input" />
                </div>
            </div>

            <div class="clear"></div>

            <div class="col_full">
                <label class="label has-text-white" for="register-form-username">Choose a Username:</label>
                <div class="control">
                <input type="text" id="register-form-username" name="register-form-username" value="" class="input" />
                </div>
            </div>


            <div class="clear"></div>

            <div class="field">
                <label class="label has-text-white" for="register-form-password">Choose Password:</label>
                <div class="control">
                <input type="password" id="register-form-password" name="register-form-password" value="" class="input" />
                </div>
            </div>

            <div class="field col_last">
                <label class="label has-text-white" for="register-form-repassword">Re-enter Password:</label>
                <div class="control">
                <input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="input" />
                </div>
            </div>

            <div class="clear"></div>

            <div class="col_full nobottommargin">
                <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
            </div>

        </form>
        </div>

    </div>
</div>