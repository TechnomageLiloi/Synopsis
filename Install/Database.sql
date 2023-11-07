create table synopsis_test
(
    key_synopsis varchar(500) not null,
    title varchar(1000) not null,
    status tinyint unsigned default 1 not null,
    synopsis text not null,
    position tinyint unsigned default 1 not null
);

create unique index synopsis_test_key_synopsis_uindex
    on synopsis_test (key_synopsis);

alter table synopsis_test
    add constraint synopsis_test_pk
        primary key (key_synopsis);

