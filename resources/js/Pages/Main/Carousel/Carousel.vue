

  <template>
    <v-carousel
      height="auto"
      show-arrows="hover"
      cycle
      hide-delimiter-background
      :interval="6000"
      :hide-delimiter-background="$vuetify.breakpoint.smAndDown"
    >
      <v-carousel-item
        v-for="(item, i) in items"
        :key="i"
        cover
      >
      <img 
        :src="item.image" 
        class="carousel-image w-[990px] sm:h-[420px] h-[210px]" 
        alt="Carousel Image"
      />
      </v-carousel-item>
    </v-carousel>
  </template>
  
  <script>
  export default {
    props: {
      items: {
        type: Array,
        required: true
      }
    },
    mounted() {
      // Log the items array to the console
      console.log('Carousel items:', this.items);
    }
  };
  </script>
  
  <style scoped>
  </style>
  