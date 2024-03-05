import axios from "axios";
import { reactive } from "vue";

export const store = reactive({
    typologies: []
})

export function getTypologiesFromApi() {
    axios.get("http://127.0.0.1:8000/api/typologies").then((response) => {
        store.typologies.push(...response.data)
    });
}