function createPagination(totalPages, currentPage){
  let liTag = '';
  let page = currentPage;
  if (page <= 0) page = 1; // Ensure page is never less than 1
  if (page > totalPages) page = totalPages; // Ensure page does not exceed total pages

  // Previous page button
  if(page > 1){
      liTag += `<li class="btn prev" onclick="createPagination(totalPages, ${page - 1})"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;
  }

  // First page
  if (page > 2) {
      liTag += `<li class="first numb" onclick="createPagination(totalPages, 1)"><span>1</span></li>`;
      if (page > 3) {
          liTag += `<li class="dots"><span>...</span></li>`;
      }
  }

  // Pages before and after current page
  let beforePage = page - 1;
  let afterPage = page + 1;
  for (let plength = beforePage; plength <= afterPage; plength++) {
      if (plength > totalPages || plength <= 0) continue; // Skip invalid page numbers
      let active = (plength === page) ? 'active' : '';
      liTag += `<li class="numb ${active}" onclick="createPagination(totalPages, ${plength})"><span>${plength}</span></li>`;
  }

  // Last page
  if (page < totalPages - 1) {
      if (page < totalPages - 2) {
          liTag += `<li class="dots"><span>...</span></li>`;
      }
      liTag += `<li class="last numb" onclick="createPagination(totalPages, ${totalPages})"><span>${totalPages}</span></li>`;
  }

  // Next page button
  if (page < totalPages) {
      liTag += `<li class="btn next" onclick="createPagination(totalPages, ${page + 1})"><span>Next <i class="fas fa-angle-right"></i></span></li>`;
  }

  element.innerHTML = liTag; // Update pagination elements
  return liTag; // Return generated HTML
}
