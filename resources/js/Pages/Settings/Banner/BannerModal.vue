<template>
    <transition name="fade">
      <div v-if="isVisible" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded shadow-lg">
          <h2 class="text-lg font-semibold">{{ bannerTitle }}</h2>
          <div class="flex items-center mt-4">
            <label class="mr-2">State:</label>
            <select v-model="currentState" class="border rounded p-1">
              <option :value="true">Active</option>
              <option :value="false">Disabled</option>
            </select>
          </div>
          <button @click="submitChanges" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Save</button>
          <button @click="closeModal" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded ml-2">Close</button>
        </div>
      </div>
    </transition>
  </template>
  
  <script setup>
  import { ref, watch, defineProps, defineEmits } from 'vue'
  
  const props = defineProps({
    isVisible: Boolean,
    bannerTitle: String,
    bannerId: Number,
    bannerState: Boolean,
  })
  
  const emit = defineEmits(['close', 'update'])
  
  const currentState = ref(props.bannerState)
  
  watch(() => props.bannerState, (newState) => {
    currentState.value = newState
  })
  
  const closeModal = () => {
    emit('close')
  }
  
  const submitChanges = () => {
    emit('update', { id: props.bannerId, state: currentState.value })
  }
  </script>
  
  <style scoped>
  .fade-enter-active, .fade-leave-active {
    transition: opacity 0.3s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    opacity: 0;
  }
  </style>
  