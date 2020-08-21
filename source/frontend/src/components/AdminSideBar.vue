<template>
                <nav id="sidebar" class="m-0">
                    <div class="sidebar-header">
                        <h3>Administration</h3>
                    </div>
                    <ul class="list-unstyled components">
                        <p>Services :</p>
                        <li class="service">
                            <router-link to="/admin/payments">Payment</router-link>
                            <ul class="subservice list-unstyled">
                                <li>
                                    <router-link to="/admin/payments/transactions">Transactions</router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/payments/refunds">Refunds</router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="service">
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Products</a>
                        </li>
                        <li class="service">
                            <a href="#">Users</a>
                        </li>
                        <li class="service">
                            <a href="#">Carts</a>
                        </li>
                    </ul>
                </nav>
</template>
<script>
export default {
  name: "AdminSideBar"
};
</script>
<style>
.service a.router-link-exact-active{
    background: #6D7FCC;
    background-color: #6D7FCC
}
.service{
    background: #343A40;
    background-color: #343A40;
}
</style>
