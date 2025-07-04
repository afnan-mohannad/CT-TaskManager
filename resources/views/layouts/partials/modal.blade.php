<div class="modal fade" id="taskModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="taskModalForm" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Add New Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="task_id" id="taskId">
        <input type="hidden" name="project_id" value="{{ $selected }}">
        <div class="mb-3">
          <label for="taskTitle" class="form-label">Task Title</label>
          <input type="text" class="form-control" id="taskTitle" name="title" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" id="modalSaveBtn">Save</button>
      </div>
    </form>
  </div>
</div>
