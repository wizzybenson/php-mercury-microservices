<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <h2>Administration</h2>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import AdminSideBar from "@/components/AdminSideBar.vue";
export default {
  name: "Admin",
  components: {
    AdminSideBar
  }
};
</script>
