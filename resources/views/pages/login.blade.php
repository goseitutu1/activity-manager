{{-- @extends('layouts.default')
@section('content') --}}
<div class="container">

<div class="row align-items-center">
<div class="col-md-auto">
                <div id="formContent">
                    <!-- Tabs Titles -->

                    <!-- Icon -->
                    <div class="fadeIn first">
                        <h1>Login</h1>
                    </div>

                    <!-- Login Form -->
                    <form>
                        <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
                        <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
                        <input type="submit" class="fadeIn fourth" value="Log In">
                    </form>

                    <!-- Remind Passowrd -->
                    <div id="formFooter">
                        <a class="underlineHover" href="#">Forgot Password?</a>
                    </div>

                </div>
            </div>
    </div>
    </div>
{{-- @stop --}}
