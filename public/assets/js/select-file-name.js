function selectFileName(target)
{
    let files = target.files;
    const divFileName = document.getElementById('file-name');
    divFileName.innerHTML = '';
    divFileName.innerHTML +=
        (files.length == 1)
            ? files[0].name
            : files.length+ " files.";
}