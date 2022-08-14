<template>

 <div id="layout-wrapper" style="zoom: 100%;">
    <top-bar></top-bar>
    <aside-menu></aside-menu>
    <div class="main-content">
      <slot/>
      <footer-bar></footer-bar>
    </div>
</div>
</template>

<script>
import FooterBar from '../layouts/FooterBar';
import AsideMenu from '../layouts/AsideMenu';
import TopBar from '../layouts/TopBar';

export default {
  components: {FooterBar,AsideMenu,TopBar},
  data() {
    return {};
  },
};
</script>



