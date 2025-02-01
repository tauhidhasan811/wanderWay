function handleFormSubmit(event) {
    const isDelete = event.submitter && event.submitter.name === 'delete';
    if (isDelete) {
        const confirmDelete = confirm("Are you sure you want to delete your account?");
        return confirmDelete; // Form submits only if the user confirms.
    }
    return true; // Allow other buttons (like 'Edit profile') to work normally.
}
function page_change()
{
    window.location.href='search.php';
}
function page_change_package()
{
    window.location.href='package.php';
}