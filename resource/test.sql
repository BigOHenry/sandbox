-- auto-generated definition
CREATE TABLE test_table
(
    id           SERIAL                          NOT NULL
        CONSTRAINT test_table_pk
            PRIMARY KEY,
    int          INTEGER,
    string       VARCHAR(10) DEFAULT NULL::CHARACTER VARYING,
    bool         BOOLEAN     DEFAULT FALSE       NOT NULL,
    bool_varchar CHAR        DEFAULT '0'::BPCHAR NOT NULL
);

ALTER TABLE test_table
    OWNER TO flexii;

CREATE UNIQUE INDEX test_table_id_uindex
    ON test_table (id);

