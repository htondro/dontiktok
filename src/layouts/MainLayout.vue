<template>
  <q-layout view="hHh lpR fff">
    <q-page-container>
      <router-view />
    </q-page-container>

    <q-footer bordered class="bg-dark text-grey">
      <div class="row items-center justify-center small">made with ❤️️</div>
    </q-footer>
  </q-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'MainLayout',

  setup() {
    return {};
  },
});
</script>
