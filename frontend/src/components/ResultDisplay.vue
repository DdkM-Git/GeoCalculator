<template>
  <div class="result-display">
    <span v-if="kilometers !== null && meters !== null"> {{ kilometers }} km {{ meters }} m </span>
    <span v-else class="no-result">Brak wyniku</span>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  kilometers: number | null;
  meters: number | null;
}>();
</script>

<style scoped>
.result-display {
  font-size: 18px;
  font-weight: bold;
  color: #007bff;
  margin-top: 10px;
}

.no-result {
  color: #555;
  font-style: italic;
}
</style>
