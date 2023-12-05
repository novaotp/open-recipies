// Searches for the term whilst removing all other paramaters
const searchValue = document.getElementById('search-value');
const search = document.getElementById('search');

search.addEventListener('click', () => {
  if (searchValue.value === "") {
    window.location.href = "/app";
    return;
  }

  window.location.href = `/app?search=${searchValue.value}`;
});

// Show / hide sort options + control styles
const showSortOptions = document.getElementById('show-sort-options');
const sortOptions = document.getElementById('sort-options');

showSortOptions.addEventListener('click', () => {
  if (sortOptions.classList.contains('hidden')) {
    sortOptions.classList.remove('hidden');
    showSortOptions.classList.remove('rounded-br-md');
    sortOptions.classList.add('flex');
    return;
  }

  sortOptions.classList.remove('flex');
  showSortOptions.classList.add('rounded-br-md');
  sortOptions.classList.add('hidden');
})
