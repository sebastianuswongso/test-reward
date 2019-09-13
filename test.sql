PGDMP     ,    (                w            ovo    11.4    11.3                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false                       1262    17748    ovo    DATABASE     �   CREATE DATABASE ovo WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE ovo;
             postgres    false            �            1259    17749    ci_sessions    TABLE     �   CREATE TABLE public.ci_sessions (
    id character varying(128) NOT NULL,
    ip_address character varying(45) NOT NULL,
    "timestamp" bigint DEFAULT 0 NOT NULL,
    data text DEFAULT ''::text NOT NULL
);
    DROP TABLE public.ci_sessions;
       public         postgres    false            �            1259    17768    control    TABLE     �   CREATE TABLE public.control (
    id integer NOT NULL,
    control_code character varying(255) NOT NULL,
    control_value character varying(255) NOT NULL
);
    DROP TABLE public.control;
       public         postgres    false            �            1259    17766    config_id_seq    SEQUENCE     �   CREATE SEQUENCE public.config_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.config_id_seq;
       public       postgres    false    200                       0    0    config_id_seq    SEQUENCE OWNED BY     @   ALTER SEQUENCE public.config_id_seq OWNED BY public.control.id;
            public       postgres    false    199            �            1259    17760    users    TABLE     �   CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    range_from numeric(10,2) NOT NULL,
    range_to numeric(10,2) NOT NULL
);
    DROP TABLE public.users;
       public         postgres    false            �            1259    17758    users_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    198                       0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       postgres    false    197            �
           2604    17771 
   control id    DEFAULT     g   ALTER TABLE ONLY public.control ALTER COLUMN id SET DEFAULT nextval('public.config_id_seq'::regclass);
 9   ALTER TABLE public.control ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    200    199    200            �
           2604    17763    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    197    198    198                      0    17749    ci_sessions 
   TABLE DATA               H   COPY public.ci_sessions (id, ip_address, "timestamp", data) FROM stdin;
    public       postgres    false    196   �                 0    17768    control 
   TABLE DATA               B   COPY public.control (id, control_code, control_value) FROM stdin;
    public       postgres    false    200   �                 0    17760    users 
   TABLE DATA               ?   COPY public.users (id, name, range_from, range_to) FROM stdin;
    public       postgres    false    198   	                  0    0    config_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.config_id_seq', 1, true);
            public       postgres    false    199                       0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 5, true);
            public       postgres    false    197            �
           2606    17776    control config_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.control
    ADD CONSTRAINT config_pkey PRIMARY KEY (id);
 =   ALTER TABLE ONLY public.control DROP CONSTRAINT config_pkey;
       public         postgres    false    200            �
           2606    17765    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    198            �
           1259    17757    ci_sessions_timestamp    INDEX     T   CREATE INDEX ci_sessions_timestamp ON public.ci_sessions USING btree ("timestamp");
 )   DROP INDEX public.ci_sessions_timestamp;
       public         postgres    false    196                  x������ � �         &   x�3�tq�������rwr�42 �=... �U�         Z   x�5˻
�0F���Ô���"Ύ.��B��qi��/`�rI��23;f�=(bng�ߊ���zPƦ� ��<�
o"�H�i�h'�9��     