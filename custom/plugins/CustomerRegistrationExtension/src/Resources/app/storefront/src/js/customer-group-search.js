import Plugin from 'src/plugin-system/plugin.class';

export default class CustomerGroupSearch extends Plugin {
    init() {
        this.inputElement = this.el;
        this.baseUrl = this.inputElement.dataset.baseUrl;
        this.createSuggestionBox();
        this.inputElement.addEventListener('input', this.onInput.bind(this));
    }

    onInput(event) {
        const query = event.target.value.trim();

        if (query.length < 3) {
            this.clearSuggestions();
            return;
        }

        fetch(`${this.baseUrl}/customer-group/search?term=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                this.showSuggestions(data);
            })
            .catch(error => console.error('Search error:', error));
    }

    createSuggestionBox() {
        this.suggestionBox = document.createElement('ul');
        this.suggestionBox.className = 'list-group mt-1';
        this.inputElement.insertAdjacentElement('afterend', this.suggestionBox);
    }

    showSuggestions(groups) {
        this.clearSuggestions();
        groups.forEach(group => {
            const item = document.createElement('li');
            item.className = 'list-group-item';
            item.textContent = group.name;
            item.addEventListener('click', () => {
                this.inputElement.value = group.name;
                this.clearSuggestions();
            });
            this.suggestionBox.appendChild(item);
        });
    }

    clearSuggestions() {
        this.suggestionBox.innerHTML = '';
    }
}
