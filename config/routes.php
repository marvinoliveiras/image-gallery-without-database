<?php
use App\Controller\{
    DirectoryInsertionForm,
    ImagesInsertionForm,
    PersistDirectory, PersistImages,
    AdminListAllGalleries, Dashboard,
    DeleteGallery, FormRenameDirectory,
    FormRenameImage, ManageImagesFromTheGallery,
    PublicListAllGalleries, PublicListAllImages,
    RemoveFile, RenameDirectory,RenameImage};
return [
    '/admin' => Dashboard::class,
    '/admin/gallery-insertion-form' =>
        DirectoryInsertionForm::class,
    '/admin/persist-gallery' =>
        PersistDirectory::class,
    '/admin/persist-images' =>
        PersistImages::class,
    '/admin/images-insertion-form' =>
        ImagesInsertionForm::class,
    '/admin/list-all-galleries' =>
        AdminListAllGalleries::class,
    '/admin/delete-gallery' =>
        DeleteGallery::class,
    '/admin/delete-file' =>
        RemoveFile::class,
    '/admin/manage-images-from-the-gallery' =>
        ManageImagesFromTheGallery::class,
    '/admin/rename-gallery-form' =>
        FormRenameDirectory::class,
    '/admin/rename-gallery' =>
        RenameDirectory::class,
    '/admin/rename-img-form' =>
        FormRenameImage::class,
    '/admin/rename-image' =>
        RenameImage::class,
    '/' =>
        PublicListAllGalleries::class,
    '/view-images-from-the-gallery' =>
        PublicListAllImages::class,
];
