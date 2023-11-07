create table synopsis_notes
(
    key_note varchar(500) not null,
    title varchar(1000) not null,
    status tinyint unsigned default 1 not null,
    note text not null,
    position tinyint unsigned default 1 not null
);

create unique index synopsis_notes_key_synopsis_uindex
    on synopsis_notes (key_note);

alter table synopsis_notes
    add constraint synopsis_notes_pk
        primary key (key_note);

