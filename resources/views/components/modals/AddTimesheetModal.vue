<div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden" id="modal">
    <div class="bg-white rounded-sm p-6 w-1/3">
        <h1 class="text-2xl font-bold">{{ $title }}</h1>
        <p class="text-md font-normal py-3 border-b border-gray-500 mb-6">{{ $subtitle }}</p>

        <form method="POST" action="{{ $action }}">
            @csrf
            <div class="mb-4">
                <label for="employeeName" class="block text-sm font-medium text-gray-700">Employee Name</label>
                <input type="text" name="employee_name" id="employeeName" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="taskId" class="block text-sm font-medium text-gray-700">Task ID</label>
                <input type="text" name="task_id" id="taskId" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="project" class="block text-sm font-medium text-gray-700">Project</label>
                <input type="text" name="project" id="project" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="approximatedHours" class="block text-sm font-medium text-gray-700">Approximated Hours</label>
                <input type="number" name="approximated_hours" id="approximatedHours" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="submittedHours" class="block text-sm font-medium text-gray-700">Submitted Hours</label>
                <input type="number" name="submitted_hours" id="submittedHours" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="flex justify-end">
                <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2" onclick="closeModal()">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Time Entry</button>
            </div>
        </form>
    </div>
</div>
