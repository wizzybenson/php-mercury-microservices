<template>
<div>
    <header id="main-header" class="bg-light pt-2">
        <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center text-lg-left">
            <h1>
                <router-link to="/"><img alt="commerce" src="../assets/logo.png" /></router-link>
            </h1>
            </div>
            <div class="col-lg-8 align-self-center text-center d-none d-lg-block">
            </div>
        </div>
        </div>
    </header>
    <b-navbar toggleable="md" type="dark" style="background: #2F4F4F; border-bottom: 2px solid #DCDCDC; border-top: 2px solid #DCDCDC; line-height: 0" class="py-0">
        <b-container>
            <b-row>
                <b-navbar-brand></b-navbar-brand>
                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                <b-collapse id="nav-collapse" is-nav>
                    <b-navbar-nav>
                        <b-nav-item><router-link to="/" class="nav-link active" title="Home"><i class="fas fa-home" style="font-size: 13px"></i> Home</router-link></b-nav-item>
                        <b-nav-item><router-link to="/admin" class="nav-link active" title="Administration"><i class="fas fa-users-cog" style="font-size: 13px"></i> Administration</router-link></b-nav-item>
                        <b-nav-item><router-link to="/makePayment" class="nav-link active" title="Administration"><i class="fas fa-users-cog" style="font-size: 13px"></i> make Payment</router-link></b-nav-item>
                    </b-navbar-nav>
                </b-collapse>
            </b-row>
        </b-container>
    </b-navbar>
</div>
</template>
<script>
export default {
  name: "Header"
};
</script>
