create table TodoSmart.users
(
    id       int auto_increment
        primary key,
    username varchar(30)  null,
    password varchar(300) null,
    isAdmin  smallint     null
);
create table TodoSmart.category
(
    id           int auto_increment
        primary key,
    categoryName varchar(30) null
);
create table TodoSmart.todos
(
    id          int auto_increment
        primary key,
    title       varchar(200)  null,
    description varchar(2000) null,
    status      varchar(20)   null,
    assignedTo  varchar(30)   null,
    createdBy   varchar(30)   null,
    dateCreated date          null,
    dateUpdated date          null,
    category    varchar(30)   null
);