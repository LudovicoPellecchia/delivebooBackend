import axios from "axios";
import { reactive } from "vue";

export const store = reactive({
    typologies: []
})

export async function getTypologiesFromApi() {
    try {
        const response = await axios.get("http://127.0.0.1:8000/api/typologies");
        store.typologies.push(...response.data);
    } catch (error) {
        console.error("Error fetching typologies:", error);
    }
}