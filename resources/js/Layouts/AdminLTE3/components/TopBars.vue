<script setup>
import { Head, Link } from "@inertiajs/vue3";
// export default {
//   name: "TopBar",
// };

</script>


<template lang="">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <Link href="/" class="nav-link">Home</Link>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <Link href="/test" class="nav-link">Test</Link>
      </li>
    </ul>

    
  </nav>
  <!-- /.navbar -->

</template>
