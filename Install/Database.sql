create table book
(
    key_quest varchar(1000) not null,
    program text null,
    data json not null,
    constraint book_pk
        primary key (key_quest)
);