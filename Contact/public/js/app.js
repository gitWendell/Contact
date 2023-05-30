document.addEventListener('click', async function(event) {
    if (event.target.classList.contains('delete-contact')) {
        var contact_id = event.target.getAttribute('data-id');

        if (confirm('Are you sure you want to delete this contact?')) {
            try {
                const response = await fetch('/contact/destroy/' + contact_id, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                if (response.ok) {

                    location.reload();
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var contact_items = document.querySelectorAll('#contact-grid tbody tr');
    var items_per_page = 1;
    var current_page = 1;
    var searchInput = document.getElementById('search-input');

    function show_items(page) {
        var start_index = (page - 1) * items_per_page;
        var end_index = start_index + items_per_page;

        contact_items.forEach(function(item, index) {
            item.style.display = (index >= start_index && index < end_index) ? 'table-row' : 'none';
        });
    }

    function update_pagination_buttons() {
        var total_items = contact_items.length;
        var total_pages = Math.ceil(total_items / items_per_page);

        var pagination_container = document.getElementById('pagination-container');
        pagination_container.innerHTML = '';

        for (var i = 1; i <= total_pages; i++) {
            var button = document.createElement('span');
            button.classList.add('pagination-link');
            button.textContent = i;

            if (i === current_page) {
                button.classList.add('active');
            }

            button.addEventListener('click', function() {
                current_page = parseInt(this.textContent);
                show_items(current_page);
                update_pagination_buttons();
            });

            pagination_container.appendChild(button);
        }
    }

    async function fetchContacts(search_contact) {
        var response = await fetch(`/contact/search/${search_contact}`);
        if (!response.ok) {
            throw new Error('Failed to fetch contacts');
        }
        var data = await response.json();
        console.log(data.length)
        var newContactItems = data.map(function(contact) {
            return `
                <tr>
                    <td scope="row">${contact.name}</td>
                    <td>${contact.company}</td>
                    <td>${contact.phone}</td>
                    <td>${contact.email}</td>
                    <td>
                        <div class="d-flex">
                            <a href="/contact/edit/${contact.id}" class="mr-2">Edit</a>
                            <a href="/" class="delete-contact" data-id="${contact.id}">Delete</a>
                        </div>
                    </td>
                </tr>
            `;
        });
        
        var tbody = document.querySelector('#contact-grid tbody');
        tbody.innerHTML = newContactItems.join('');

        contact_items = document.querySelectorAll('#contact-grid tbody tr');
        show_items(current_page);
        update_pagination_buttons();
    }

    searchInput.addEventListener('keyup', function(event) {
        var search_contact = event.target.value.trim();
        fetchContacts(search_contact);
    });

    show_items(current_page);
    update_pagination_buttons();
});