PGDMP     ;    4                x         
   biblioteca    10.13    10.13 *               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false                       1262    24585 
   biblioteca    DATABASE     �   CREATE DATABASE biblioteca WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Bolivia.1252' LC_CTYPE = 'Spanish_Bolivia.1252';
    DROP DATABASE biblioteca;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false                       0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    24737    autores    TABLE     \   CREATE TABLE public.autores (
    id integer NOT NULL,
    nombre character varying(100)
);
    DROP TABLE public.autores;
       public         postgres    false    3            �            1259    24735    autores_id_seq    SEQUENCE     �   CREATE SEQUENCE public.autores_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.autores_id_seq;
       public       postgres    false    3    197                        0    0    autores_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.autores_id_seq OWNED BY public.autores.id;
            public       postgres    false    196            �            1259    24745 	   documento    TABLE     [  CREATE TABLE public.documento (
    id integer NOT NULL,
    titulo_p character varying(100),
    titulo_s character varying(100),
    idioma character varying(20),
    tipo character varying(20),
    ruta character varying(100),
    descripcion text,
    palabras_clave character varying(300),
    id_editorial integer,
    id_usuario integer
);
    DROP TABLE public.documento;
       public         postgres    false    3            �            1259    24743    documento_id_seq    SEQUENCE     �   CREATE SEQUENCE public.documento_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.documento_id_seq;
       public       postgres    false    199    3            !           0    0    documento_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.documento_id_seq OWNED BY public.documento.id;
            public       postgres    false    198            �            1259    24756 	   editorial    TABLE     ^   CREATE TABLE public.editorial (
    id integer NOT NULL,
    nombre character varying(100)
);
    DROP TABLE public.editorial;
       public         postgres    false    3            �            1259    24754    editorial_id_seq    SEQUENCE     �   CREATE SEQUENCE public.editorial_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.editorial_id_seq;
       public       postgres    false    3    201            "           0    0    editorial_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.editorial_id_seq OWNED BY public.editorial.id;
            public       postgres    false    200            �            1259    24762    escrito    TABLE     b   CREATE TABLE public.escrito (
    id_documento integer NOT NULL,
    id_autor integer NOT NULL
);
    DROP TABLE public.escrito;
       public         postgres    false    3            �            1259    24769    usuarios    TABLE       CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nombre character varying(50),
    login character varying(30),
    pass character varying(200),
    correo character varying(100),
    telefono character varying(11),
    perfil character varying(20)
);
    DROP TABLE public.usuarios;
       public         postgres    false    3            �            1259    24767    usuarios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public       postgres    false    3    204            #           0    0    usuarios_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;
            public       postgres    false    203            �
           2604    24740 
   autores id    DEFAULT     h   ALTER TABLE ONLY public.autores ALTER COLUMN id SET DEFAULT nextval('public.autores_id_seq'::regclass);
 9   ALTER TABLE public.autores ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    196    197    197            �
           2604    24748    documento id    DEFAULT     l   ALTER TABLE ONLY public.documento ALTER COLUMN id SET DEFAULT nextval('public.documento_id_seq'::regclass);
 ;   ALTER TABLE public.documento ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    199    198    199            �
           2604    24759    editorial id    DEFAULT     l   ALTER TABLE ONLY public.editorial ALTER COLUMN id SET DEFAULT nextval('public.editorial_id_seq'::regclass);
 ;   ALTER TABLE public.editorial ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    201    200    201            �
           2604    24772    usuarios id    DEFAULT     j   ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    203    204    204                      0    24737    autores 
   TABLE DATA               -   COPY public.autores (id, nombre) FROM stdin;
    public       postgres    false    197   �+                 0    24745 	   documento 
   TABLE DATA               �   COPY public.documento (id, titulo_p, titulo_s, idioma, tipo, ruta, descripcion, palabras_clave, id_editorial, id_usuario) FROM stdin;
    public       postgres    false    199   G,                 0    24756 	   editorial 
   TABLE DATA               /   COPY public.editorial (id, nombre) FROM stdin;
    public       postgres    false    201   .                 0    24762    escrito 
   TABLE DATA               9   COPY public.escrito (id_documento, id_autor) FROM stdin;
    public       postgres    false    202   v.                 0    24769    usuarios 
   TABLE DATA               U   COPY public.usuarios (id, nombre, login, pass, correo, telefono, perfil) FROM stdin;
    public       postgres    false    204   �.       $           0    0    autores_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.autores_id_seq', 8, true);
            public       postgres    false    196            %           0    0    documento_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.documento_id_seq', 7, true);
            public       postgres    false    198            &           0    0    editorial_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.editorial_id_seq', 7, true);
            public       postgres    false    200            '           0    0    usuarios_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.usuarios_id_seq', 4, true);
            public       postgres    false    203            �
           2606    24742    autores autores_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.autores
    ADD CONSTRAINT autores_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.autores DROP CONSTRAINT autores_pkey;
       public         postgres    false    197            �
           2606    24753    documento documento_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.documento
    ADD CONSTRAINT documento_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.documento DROP CONSTRAINT documento_pkey;
       public         postgres    false    199            �
           2606    24761    editorial editorial_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.editorial
    ADD CONSTRAINT editorial_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.editorial DROP CONSTRAINT editorial_pkey;
       public         postgres    false    201            �
           2606    24766    escrito escrito_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.escrito
    ADD CONSTRAINT escrito_pkey PRIMARY KEY (id_documento, id_autor);
 >   ALTER TABLE ONLY public.escrito DROP CONSTRAINT escrito_pkey;
       public         postgres    false    202    202            �
           2606    24774    usuarios usuarios_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public         postgres    false    204            �
           2606    24775    documento documento_ibfk_1    FK CONSTRAINT     �   ALTER TABLE ONLY public.documento
    ADD CONSTRAINT documento_ibfk_1 FOREIGN KEY (id_editorial) REFERENCES public.editorial(id) ON UPDATE CASCADE ON DELETE SET NULL;
 D   ALTER TABLE ONLY public.documento DROP CONSTRAINT documento_ibfk_1;
       public       postgres    false    201    2702    199            �
           2606    24780    escrito escrito_ibfk_1    FK CONSTRAINT     �   ALTER TABLE ONLY public.escrito
    ADD CONSTRAINT escrito_ibfk_1 FOREIGN KEY (id_documento) REFERENCES public.documento(id) ON UPDATE CASCADE ON DELETE CASCADE;
 @   ALTER TABLE ONLY public.escrito DROP CONSTRAINT escrito_ibfk_1;
       public       postgres    false    2700    202    199            �
           2606    24785    escrito escrito_ibfk_2    FK CONSTRAINT     �   ALTER TABLE ONLY public.escrito
    ADD CONSTRAINT escrito_ibfk_2 FOREIGN KEY (id_autor) REFERENCES public.autores(id) ON UPDATE CASCADE;
 @   ALTER TABLE ONLY public.escrito DROP CONSTRAINT escrito_ibfk_2;
       public       postgres    false    2698    202    197               Z   x�3��M,JN����W(H,JMI��2��MLI,�LLO�2�tN-N,R-�L�2E�0�����R���@�,8�KR�R��S�s�b���� �f\         �  x���An�0E��)�$9�ک�@@bA�+@P��C"�2�*�B{�)6�E�s�����y�S�����/�5���C/l����n�����Z^ŭ��)�5�h�PwԘ�Ng�ǃq"yV�C���"^�C��%#�[��tɭ�?6�j��y���T;��À��Վ�
:;�SG
ĸ{�b��Ҭ8�١J��>�����"��}AJ����Z���E���Ȉ �5�2Z�^�^�D�B�8�1�g�ɯE���`�Q�g �T_S�����&�a$+E�����Ώ�3ĺ1���	}&ߕ��2)���v�}�����ʲ,d�͕	v�-6��&=g�b��Ɍ)������FO6����4���'x� g�N�ܴ;�0���S�b��Ǩ}I��|�N ���:V�R����K�8N��&�9��ʲ�X{9         V   x�3��M-JNMI��2�L,�L�K�2��IT(N�I-sM8��K3sr���8s+2s�|�́�t���D��܂ļJ�=... w\�         %   x�3�4�2�4�2�4�2�4�2�4�2������� 5��         �   x�e���0E��W��y��
;[;���`Ƅe4~�b,2ڜ}ݳ�ɻG�O���=q&�%p!U��9>��N[DjG�h���@?D?�uK8Pb�q3�����n*Tݴ�Z��;&OLB|W�'W���n���8r�R8�m!�j��N�O     