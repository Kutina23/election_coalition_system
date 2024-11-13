// Form validation for the agents and admin registration forms
document.addEventListener('DOMContentLoaded', function() {
    const agentForm = document.querySelector('form');
    if (agentForm) {
        agentForm.addEventListener('submit', function(e) {
            let errors = [];

            const centerCode = document.querySelector('input[name="center_code"]').value;
            const centerName = document.querySelector('input[name="center_name"]').value;
            const provisionalResults = document.querySelector('input[name="pres_provisional_results"]').value;

            if (centerCode.trim() === '') {
                errors.push("Center Code is required.");
            }

            if (centerName.trim() === '') {
                errors.push("Center Name is required.");
            }

            if (provisionalResults.trim() === '' || isNaN(provisionalResults)) {
                errors.push("Provisional Results must be a valid number.");
            }

            if (errors.length > 0) {
                e.preventDefault();
                alert(errors.join("\n"));
            }
        });
    }
});
