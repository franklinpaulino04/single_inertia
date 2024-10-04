
class BaseService {
    constructor(model) {
        this.model = model;
    }

    async getAll() {
        return await axios.get(`/${this.model}`,{ params: { json: true }});
    }

    async get(id) {
        return await axios.get(`/${this.model}/${id}`);
    }

    async create(payload) {
        return await axios.post(`/${this.model}`, payload);
    }

    async update(id, payload) {
        return await axios.put(`/${this.model}/${id}`, payload);
    }

    async delete(id) {
        return await axios.delete(`/${this.model}/${id}`);
    }
}

export default BaseService;
