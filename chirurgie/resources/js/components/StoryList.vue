<template>
  <div>
    <div v-if="currentChapter" class="chapter-card">
      <h2>{{ currentChapter.title }}</h2>
      <p>{{ currentChapter.content }}</p>
      <ul>
        <li v-for="choice in currentChapter.choices" :key="choice.id">
          <button @click="selectChoice(choice)">
            {{ choice.text }}
          </button>
        </li>
      </ul>
    </div>
    <div v-else>
      <p>Chargement en cours...</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const stories = ref([]);
const currentStory = ref(null);
const currentChapter = ref(null);

onMounted(async () => {
  try {
    const response = await fetch('/api/stories');
    const data = await response.json();
    console.log('Stories data:', data);

    stories.value = data;
    if (stories.value.length > 0 && stories.value[0].chapters.length > 0) {
      startStory(stories.value[0]);
    } else {
      console.warn('Aucune histoire ou aucun chapitre trouvé.');
    }
  } catch (error) {
    console.error("Erreur lors de la récupération de l'histoire :", error);
  }
});

function startStory(story) {
  currentStory.value = story;
  currentChapter.value = story.chapters[0];
}

function selectChoice(choice) {
  if (!choice.next_chapter_id) {
    alert("Fin de l'histoire 🎉");
    currentChapter.value = null;
    return;
  }

  const nextChapter = currentStory.value.chapters.find(
    chapter => chapter.id === choice.next_chapter_id
  );

  if (nextChapter) {
    currentChapter.value = nextChapter;
  } else {
    console.warn('Chapitre suivant non trouvé.');
    currentChapter.value = null;
  }
}
</script>

<style scoped>
.chapter-card {
  border: 1px solid #ccc;
  padding: 1rem;
  margin-bottom: 1rem;
  border-radius: 8px;
}
button {
  padding: 0.5rem 1rem;
  margin: 0.5rem 0;
  border: none;
  border-radius: 4px;
  background-color: #007bff;
  color: white;
  cursor: pointer;
}
button:hover {
  background-color: #0056b3;
}
</style>
