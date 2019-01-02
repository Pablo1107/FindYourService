<template id="">
  <div>
    <Navbar v-model="search" class="fixed-top"></Navbar>
    <div class="container-fluid">
      <div class="row">
        <Column></Column>

        <Services :search="search"></Services>
      </div>
    </div>
  </div>
</template>

<script charset="utf-8">
import GoogleMap from './components/GoogleMap';
import Navbar from './components/Navbar';
import Column from './components/Column';
import Services from './components/Services';

export default {
  components: {
    Navbar,
    Column,
    Services,
  },
  data() {
    return {
      search: '',
      visible: false,
    }
  },
}
</script>
