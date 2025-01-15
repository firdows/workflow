<script setup>
import TopBar from "./components/TopBars.vue";
import Slidebar from "./components/Slidebar.vue";
import Footer from "./components/Footer.vue";

// document.body.classList.add("sidebar-min");
</script>


<template lang="">
    <div class="wrapper">
      <TopBar />
      <Slidebar />

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <slot />
      
    </div>
  </section>
    </div>
    
      <Footer />
    </div>
</template>
