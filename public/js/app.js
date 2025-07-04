// get csrf token from meta tag
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.addEventListener('DOMContentLoaded', () => {
    const taskListing = document.getElementById('taskListing');
    let dragged = null;

    taskListing.addEventListener('dragstart', e => dragged = e.target);
    taskListing.addEventListener('dragover', e => e.preventDefault());
    taskListing.addEventListener('drop', e => {
        e.preventDefault();
        if (dragged !== e.target && e.target.closest('.task-item')) {
            taskListing.insertBefore(dragged, e.target.closest('.task-item'));
            updateOrder();
        }
    });

    document.getElementById('taskModalForm').onsubmit = e => {
        e.preventDefault();
        const id = document.getElementById('taskId').value;
        const url = id ? `/tasks/${id}` : '/tasks';
        const method = id ? 'PUT' : 'POST';

        fetch(url, {
            method,
            headers: { 
                'Content-Type': 'application/json', 
                'X-CSRF-TOKEN': csrfToken 
            },
            body: JSON.stringify({
                title: document.getElementById('taskTitle').value,
                project_id: document.querySelector('[name=project_id]').value
            })
        })
        .then(res => res.json())
        .then(data => location.reload());
    };
});

function openAddTaskModal() {
    document.getElementById('modalTitle').innerText = 'Add Task';
    document.getElementById('taskId').value = '';
    document.getElementById('taskTitle').value = '';
    document.getElementById('modalSaveBtn').innerText = 'Add Task';
    new bootstrap.Modal(document.getElementById('taskModal')).show();
}

function openEditTaskModal(id, title) {
    document.getElementById('modalTitle').innerText = 'Edit Task';
    document.getElementById('modalSaveBtn').innerText = 'Edit Task';
    document.getElementById('taskId').value = id;
    document.getElementById('taskTitle').value = title;
    new bootstrap.Modal(document.getElementById('taskModal')).show();
}

function deleteTask(id) {
    if (confirm('Are you sure task will be deleted forever?')) {
        fetch(`/tasks/${id}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': csrfToken }
        }).then(() => location.reload());
    }
}

function updateOrder() {
    const ids = [...document.querySelectorAll('.task-item')].map(el => el.dataset.id);
    fetch('/tasks/reorder', {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': csrfToken 
        },
        body: JSON.stringify({ tasks: ids })
    });
}
