

async function confirmDelete(title, formID) {
  const message = `Are you sure want to delete ${title}?`;

  const result = await Swal.fire({
    title: "Are you sure?",
    text: message,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
  })

  if (result.isConfirmed) {
    $(`#${formID}`).submit();
  }

}