<?php

class Todo {
    private string $title;
    private string $description;
    private string $status;
    private string $assignedTo;
    private string $createdBy;
    private string $dateCreated;
    private string $dateUpdated;
    private string $category;

    function  __constructor($title, $description, $status, $assignedTo, $createdBy,
                            $dateCreated, $dateUpdated, $category) {
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->assignedTo = $assignedTo;
        $this->createdBy = $createdBy;
        $this->dateCreated = $dateCreated;
        $this->dateUpdated = $dateUpdated;
        $this->category = $category;
    }

    function getTitle() {
        return $this->title;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getAssignedTo() {
        return $this->assignedTo;
    }

    function setAssignedTo($assignedTo) {
        $this->assignedTo = $assignedTo;
    }

    function getCreatedBy() {
        return $this->createdBy;
    }

    function getDateCreated() {
        return $this->dateCreated;
    }

    function getDateUpdated() {
        return $this->dateUpdated;
    }

    function setDateUpdated($dateUpdated) {
        $this->dateUpdated = $dateUpdated;
    }

    function getCategory() {
        return $this->category;
    }

    function setCategory($category) {
        $this->category = $category;
    }
}