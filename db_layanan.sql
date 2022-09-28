PGDMP     )                    z            layanan_apl    14.3    14.3 P    `           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            a           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            b           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            c           1262    16686    layanan_apl    DATABASE     k   CREATE DATABASE layanan_apl WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_Indonesia.1252';
    DROP DATABASE layanan_apl;
                postgres    false            �            1259    16687    approver    TABLE     �   CREATE TABLE public.approver (
    id bigint NOT NULL,
    nama character varying,
    nip character varying NOT NULL,
    email character varying,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);
    DROP TABLE public.approver;
       public         heap    postgres    false            �            1259    16692 	   data_tamu    TABLE     �  CREATE TABLE public.data_tamu (
    id bigint NOT NULL,
    tanggal date NOT NULL,
    nama character varying(200) NOT NULL,
    nik character varying(200) NOT NULL,
    email character varying(200) NOT NULL,
    perusahaan character varying(200),
    pekerjaan character varying(200),
    keperluan text NOT NULL,
    lantai3 character(5),
    barang_masuk text,
    barang_keluar text,
    waktu_barang_masuk timestamp without time zone,
    waktu_barang_keluar timestamp without time zone,
    foto character varying(200) NOT NULL,
    no_hp character varying,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    pengawas character varying,
    kegiatan text
);
    DROP TABLE public.data_tamu;
       public         heap    postgres    false            �            1259    16697    data_tamu_id_seq    SEQUENCE     �   ALTER TABLE public.data_tamu ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.data_tamu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    210            �            1259    16698    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    16704    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    212            d           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    213            �            1259    16705    layanan    TABLE       CREATE TABLE public.layanan (
    id bigint NOT NULL,
    layanan character varying NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    status bigint DEFAULT 1 NOT NULL,
    deskripsi text,
    icon character varying
);
    DROP TABLE public.layanan;
       public         heap    postgres    false            �            1259    16711    layanan_approver    TABLE     �   CREATE TABLE public.layanan_approver (
    id bigint NOT NULL,
    layanan_id bigint,
    approver_id bigint,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);
 $   DROP TABLE public.layanan_approver;
       public         heap    postgres    false            �            1259    16714    layanan_approver_id_seq    SEQUENCE     �   ALTER TABLE public.layanan_approver ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.layanan_approver_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    215            �            1259    16715    layanan_fields    TABLE       CREATE TABLE public.layanan_fields (
    id bigint NOT NULL,
    nama character varying,
    tipe character varying,
    layanan_id bigint,
    jenis character varying,
    created_at character varying,
    updated_at character varying,
    label character varying
);
 "   DROP TABLE public.layanan_fields;
       public         heap    postgres    false            �            1259    16720    layanan_fields_id_seq    SEQUENCE     �   ALTER TABLE public.layanan_fields ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.layanan_fields_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    217            �            1259    16721    layanan_id_seq    SEQUENCE     �   ALTER TABLE public.layanan ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.layanan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    214            �            1259    16722    layanan_meta    TABLE     �   CREATE TABLE public.layanan_meta (
    id bigint NOT NULL,
    nama character varying,
    value character varying,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    request_id bigint
);
     DROP TABLE public.layanan_meta;
       public         heap    postgres    false            �            1259    16727    layanan_meta_id_seq    SEQUENCE     �   ALTER TABLE public.layanan_meta ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.layanan_meta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    220            �            1259    16728 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    16731    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    222            e           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    223            �            1259    16732    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false            �            1259    16737    pengawas_id_seq    SEQUENCE     �   ALTER TABLE public.approver ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.pengawas_id_seq
    START WITH 2
    INCREMENT BY 1
    MINVALUE 2
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    209            �            1259    16738    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    16743    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    226            f           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    227            �            1259    16744    request    TABLE     �   CREATE TABLE public.request (
    id bigint NOT NULL,
    user_id bigint,
    layanan_id bigint,
    status character varying,
    keterangan text,
    updated_at timestamp without time zone,
    created_at timestamp without time zone
);
    DROP TABLE public.request;
       public         heap    postgres    false            �            1259    16749    request_id_seq    SEQUENCE     �   ALTER TABLE public.request ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.request_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    228            �            1259    16750    users    TABLE       CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255),
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    keycloak_id character varying(255),
    keycloak_token text,
    keycloak_refresh_token text,
    keycloak_expired character varying,
    role character varying
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    16755    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    230            g           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    231            �           2604    16756    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    212            �           2604    16757    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222            �           2604    16758    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    226            �           2604    16759    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    231    230            G          0    16687    approver 
   TABLE DATA                 public          postgres    false    209   �^       H          0    16692 	   data_tamu 
   TABLE DATA                 public          postgres    false    210   �_       J          0    16698    failed_jobs 
   TABLE DATA                 public          postgres    false    212   ta       L          0    16705    layanan 
   TABLE DATA                 public          postgres    false    214   �a       M          0    16711    layanan_approver 
   TABLE DATA                 public          postgres    false    215   �c       O          0    16715    layanan_fields 
   TABLE DATA                 public          postgres    false    217   �d       R          0    16722    layanan_meta 
   TABLE DATA                 public          postgres    false    220   f       T          0    16728 
   migrations 
   TABLE DATA                 public          postgres    false    222   h       V          0    16732    password_resets 
   TABLE DATA                 public          postgres    false    224   �h       X          0    16738    personal_access_tokens 
   TABLE DATA                 public          postgres    false    226   �h       Z          0    16744    request 
   TABLE DATA                 public          postgres    false    228   i       \          0    16750    users 
   TABLE DATA                 public          postgres    false    230   j       h           0    0    data_tamu_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.data_tamu_id_seq', 33, true);
          public          postgres    false    211            i           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    213            j           0    0    layanan_approver_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.layanan_approver_id_seq', 13, true);
          public          postgres    false    216            k           0    0    layanan_fields_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.layanan_fields_id_seq', 85, true);
          public          postgres    false    218            l           0    0    layanan_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.layanan_id_seq', 20, true);
          public          postgres    false    219            m           0    0    layanan_meta_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.layanan_meta_id_seq', 32, true);
          public          postgres    false    221            n           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);
          public          postgres    false    223            o           0    0    pengawas_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.pengawas_id_seq', 6, true);
          public          postgres    false    225            p           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    227            q           0    0    request_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.request_id_seq', 24, true);
          public          postgres    false    229            r           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 11, true);
          public          postgres    false    231            �           2606    16765    data_tamu data_tamu_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.data_tamu
    ADD CONSTRAINT data_tamu_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.data_tamu DROP CONSTRAINT data_tamu_pkey;
       public            postgres    false    210            �           2606    16767    approver email 
   CONSTRAINT     J   ALTER TABLE ONLY public.approver
    ADD CONSTRAINT email UNIQUE (email);
 8   ALTER TABLE ONLY public.approver DROP CONSTRAINT email;
       public            postgres    false    209            �           2606    16769    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    212            �           2606    16771 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    212            �           2606    16773 &   layanan_approver layanan_approver_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.layanan_approver
    ADD CONSTRAINT layanan_approver_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.layanan_approver DROP CONSTRAINT layanan_approver_pkey;
       public            postgres    false    215            �           2606    16775 "   layanan_fields layanan_fields_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.layanan_fields
    ADD CONSTRAINT layanan_fields_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.layanan_fields DROP CONSTRAINT layanan_fields_pkey;
       public            postgres    false    217            �           2606    16777    layanan layanan_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.layanan
    ADD CONSTRAINT layanan_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.layanan DROP CONSTRAINT layanan_pkey;
       public            postgres    false    214            �           2606    16779    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    222            �           2606    16781    approver nip 
   CONSTRAINT     F   ALTER TABLE ONLY public.approver
    ADD CONSTRAINT nip UNIQUE (nip);
 6   ALTER TABLE ONLY public.approver DROP CONSTRAINT nip;
       public            postgres    false    209            �           2606    16783    approver pengawas_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.approver
    ADD CONSTRAINT pengawas_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.approver DROP CONSTRAINT pengawas_pkey;
       public            postgres    false    209            �           2606    16785 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    226            �           2606    16787 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    226            �           2606    16789    request request_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.request
    ADD CONSTRAINT request_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.request DROP CONSTRAINT request_pkey;
       public            postgres    false    228            �           2606    16791    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    230            �           1259    16792    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    224            �           1259    16793 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    226    226            �           2606    16794    layanan_approver fk_approver    FK CONSTRAINT     �   ALTER TABLE ONLY public.layanan_approver
    ADD CONSTRAINT fk_approver FOREIGN KEY (approver_id) REFERENCES public.approver(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;
 F   ALTER TABLE ONLY public.layanan_approver DROP CONSTRAINT fk_approver;
       public          postgres    false    215    209    3229            �           2606    16799    layanan_fields fk_layanan    FK CONSTRAINT     �   ALTER TABLE ONLY public.layanan_fields
    ADD CONSTRAINT fk_layanan FOREIGN KEY (layanan_id) REFERENCES public.layanan(id) ON UPDATE CASCADE ON DELETE CASCADE;
 C   ALTER TABLE ONLY public.layanan_fields DROP CONSTRAINT fk_layanan;
       public          postgres    false    214    217    3237            �           2606    16804    layanan_approver fk_layanan    FK CONSTRAINT     �   ALTER TABLE ONLY public.layanan_approver
    ADD CONSTRAINT fk_layanan FOREIGN KEY (layanan_id) REFERENCES public.layanan(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;
 E   ALTER TABLE ONLY public.layanan_approver DROP CONSTRAINT fk_layanan;
       public          postgres    false    215    3237    214            �           2606    16809    request fk_layanan    FK CONSTRAINT     �   ALTER TABLE ONLY public.request
    ADD CONSTRAINT fk_layanan FOREIGN KEY (layanan_id) REFERENCES public.layanan(id) ON UPDATE CASCADE ON DELETE CASCADE;
 <   ALTER TABLE ONLY public.request DROP CONSTRAINT fk_layanan;
       public          postgres    false    214    228    3237            �           2606    16814    layanan_meta fk_request    FK CONSTRAINT     �   ALTER TABLE ONLY public.layanan_meta
    ADD CONSTRAINT fk_request FOREIGN KEY (request_id) REFERENCES public.request(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;
 A   ALTER TABLE ONLY public.layanan_meta DROP CONSTRAINT fk_request;
       public          postgres    false    220    228    3251            �           2606    16819    request fk_user    FK CONSTRAINT     �   ALTER TABLE ONLY public.request
    ADD CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;
 9   ALTER TABLE ONLY public.request DROP CONSTRAINT fk_user;
       public          postgres    false    228    230    3253            G   �   x�u�M�@�������&�Z�k���J�5�S�Ă�h�?�<vf���8<�!N��\��r����nF�T����\TiM'U��95�SNf]��i��,>���C��Et��
�(3ڶ��$��~@����V��㓜�R��kpT�6�%d�����	����a�<�      H   �  x��R]o�0}ϯ�o����W�˺MH�BZiO�&8����~6]�����`]�{d]�{�4�7[H��t��e�
s��W��A�,K�m�ؠ����7(4��~��(�x�4���D=X�T(�;��=y��X�OתކVj���*<���%����a�sT��Q�0v�w\�x��R
�yw��f�|K���̶�x�]?�/1�+Fm�(��x7N`�S�`��E�Ϩ�Q���%t8���Z&�*�siZ�ܷ�Iޏ��KH�3���[>(����π5v��f(}X�_��Ӑ�Վ��O/�����uY��5{'"a�K:��\��S���+rPX�`��/�[ןɇ=&{���q[��S_�����C�:5�����l)W��� ���\w�����f���v�&`!�<�vHߘ �oZ�v�H/��O��^O|��i�8o      J   
   x���          L   F  x��S�n�0}��ኇ�J	qRR��2�+��Z@�v��d71$�;�H���X���*E�}��{O��p4L�`8���湈�9[3�$�ā�ā������T:�36���8�p�,�6�+y��t:�������np�7���{Gq�u�
&dG	���A�)�4�����.¾��������1�o*��Z�l��o��thxB��::=������M>LF�|¿$ �{��Zъ���"�ۋ��ϙ���@
W,e���!f%�%/L��g�U��'^>	�j�)�ff�6��T[���[iuX.�W�\���K\��sO�UƬ+�[���s�A,�rW�Z�X��s�5�H3KCB��9�Db3�z��y��c�c#��Orn�y���Ą�f�2,���7�V�I�����b�L�������U����pu;:��B�2�6�s�	��)$�V�j�DVk����0���W ����ܡ''4������Ɍ[+P�˙(ƕ͕Z���<S��?�Y��<�+D\*���6�]���{�^�t�ޙ�����to�߆�O2eҲ�&_Mh4~�ř2      M   �   x����
�@�O17��]]��$�P
jB'�ԃ ���}j	�,�?�\>�~���T��|[˗ld�I��ǳl��
s;��3y[ʮ,2�!�U��&��E�(�ķ8�/��W��c0E@v:Ŕn��!���6����^뙭��-�-���T�k&��]2�aد���)g��hִ7��      O   K  x�͔]k�0����
e8ݰ�+�2´��®ʱ�,���&���%:?p�ͻ�$''9o�(�	�(���+���_X`��9��&�>���K��q��oX�+���b4E僖�\1т�2��ɈD���I8��`�m�^��^�J��>v�gƊ}*�?&��v-��c�E&�k�4�]���}d���)��%*�P�pO��ݤ�m��I� �Lu9f)RZ���ԤWG3�?��	�Ц��]m�'�U~�Po��$r%hۊ���1���1���it��Kw9�K��o�/�����e���0�y;%8��\o\�W���w�      R   �  x�ݗ_k�0�����	8F����}*,�m:���'�ZJk;�l��g�5kܸ��8	H��b���s�N�������a���J���̢T���� ����E�*mAl�,��diA����ѿ+]�Q�Fp{7��¯��;�����]]��l�s
.RGR)���.9c� s�㰦F�8&bL ~�܀��6�G���JjUEed�ڤ�u��F��5[r�̏�e�62��${|� aa*S�V�)Q���������!mǸ<Gb�U%y������<)�>zXS0��4��lP8�ݦ�?�Q��cW)ڶ"��������C�#��?|�Fj7��@�x�G��mPlڌ�ʑ a��F��ߝ>��#�܍��M
?���Wυ.`�H��#�mǣg{�Z	r��Hv2X�ٜ������>�1�P(����^���;�m����9��B{�P94�yl̫b{�b+�iǫ7���[yl?�`0��q��      T   �   x���A�@໿bn*H������i]�u�j�\�]��I��Ãw�x�fyr* ͊#�]YK�zɛ�V�ƀ'� �@ɭ��p��I��B#�E~�&n	;Cڠ�eMn ��9�?V4���j�1o�+�d�.��Gu�����W.k�����'#�Qd������5r!���zR3��x`�      V   
   x���          X   
   x���          Z     x�͑AK�0���߭d#I�Ɠ�"�����4�Ju��&���SU��%��_�ÛUZ֐�N����F�8�[�t�+���(_���=�VZ�#xVV�[����FZ��Ep0�#Oa�M�2[f�=T��NW���7���`BbY WJ;ݶ��uON�A����J1�3����F`�ROo���Œ/�ew��<p=0\�S�
�L�>� Lpz>�u(/	��}?�c�C�m{����[�b���	�7�&��      \      x�ݚY��H����S�Ø��Y��D��J�$�@�/i\▐���ӯYUYGvOwm��X�U�������;%i{޴�$�ҟ�[T�/�kz�>�G���t��秴	����K�^�C�&/a��S^���M�D��;U�������ǻnm��{�q}
����?>>���Kz���������w��<9+���O�A����*i��O�%�_�;�U�.ln�ħZ5[Q���Q�w�=�h�2>�v���<�s��ęQr'ZP�q���;��G[ؽl��{�����_��
֥�u�����2������+�~��'D 4#�b�����@P?�z�-�t-fs�3�<D�%J������ǿ�K#0�Ԅ͓v��Ea�mS@��s��w�z"����!�AH7'����C8[̩��f��,b��,��@0�!R|_:�y$ƅ^�{{�H�����d⍔�Ū�׉-�"Du%����/���cG(�t�T��rL넄 Y\`�I�f"fW�n����^:��xu�]z�#�T�f�wu4�RS��F������'�2�ͽ�=��]����C+�Q+m���l�s"Vx��8%�!� ��r*�2sM�;���@�*��5sՒ+��x��)?{J��]/�}$���>N�z��un�O�o�!p�k�}Li=�GL9̧D�=�i#��׬u���Zq�0���5צ����&����5'�g�m��Nm�������Z�b1e�h�|�A��Z-ץ�'��HH���s1k�T�)���ꮋ*^k�S~�1ͽqFc�s���6Je����KFG�ЏW���ب��+�|7����������y���e.����w�V�{99x^ܻ��Y�Ϩ��%:�G}���!BA�Z��1t�]ssn#�E�'�0~��
�#��G.��,�}��3d��m 
��Mk���x��<$���3-~&::C(֕�Mg�Lڤqn��o�9�ۅ��⚞x�)�3��1��y����V�������퍳��<I��pg��
IJf��)�dFf�K�����i��5�j�#M�(C���3�`yu�98i%̉�AR�³ܵڋ�ڵ���wE}��)��_[(���%���kxl�+b���:Tb�>U%�?���k�@�BS=y-��e��z:�酨����|��� e�z��J�/�+�8��Q�㓶�>�#�?�4�7�~�_v��L�$Ix�:?~����U� �%�Gݐ]��d?[�e��6Вh���Kv������.V����|#�g�|[�U�~�*J�?���DPL�(P���z���Vu���l�W�1�����h��i�Rn4�"5.�T���^�nAt(ߒ�d�JJݪ���i�����pk1w���}$\C��D�\vW�@&b����哣Bic��H�<R��v5W�!��A�9%�n�<�̓B�5�h����ĉ��G��1hKn�^/81	�&��@�~c܃rEV� ����S����A,Gp�{���O�i���UL6k�G��<���P��X��!�A1��+�4N�nE�#�4*�ry��w8��rJB�{��Aa��&ڪ�%��B�y�VW���ן��PD����%�}���W�$>0��1�"?bPL�K�A��"f��l2Y���qR	B$b�<x��-����� 顉2 �JjX\����Y�7Z�n�A�����B��Ap�:(�U�!�/�+�� �V$�RK顖N�g`�&4X	�� Q.`�5�,x��Ѱg#��$t�'@���k���D���s��}��(ׁ��1r���U�*r��Է�(熘L�U����"�[��ǵM�k�7�Q7�wh#��)��v�zϗ��f݈�l�{��t�rg^��ވm��v�iBZk��a3�sZ�m�)s5���!7�>���5nEB��݀��2�����=�U���$�SAm��c�
���Eʕ3�V��:=�WoͲ��[$WAjm�[�(6��s'߇wCG��heFsщ��cCYŁ�
�H��`�,J�:�:����I%.�_����C�2�>�P(��JϞi�ԅհ����]Ϝ~�w�g���\���ۋ//�$�{�u�u���'��5I�/E�x�-���6*�.�F4��K,d�Ձ�eH�p������ο� B�nAX`���x�k�uO�Xh����%?h.��������Y�"�  �暅?����qס-��E��T�y�fƧ��Ε~,�WS���F��+}���|)�u��%цą�]zi�cx}ڇmx)��Ua^�dEt	�K���F#�5�,����M��Ç����,g!�D�:1=�br>cA�Q�0̜��~��B��n�\Ѩ�G�繆FHt\�ig�
�p�=�%4>�X.�u�:���tkEB��&h��T8[���C����Ɗ�z�6�5h~@@:�d0A����Y��������.�����rӬ
>U���� �޽j	1�E2h ��	��U����2�|iC��X@Va�� �0��Grp u�:�E��s�=�K���<@+�i��8�Ue����M��>�}T������`�2�@� 9 5Χ�O��8-�R1�
в��! "³�W��Gc ԱC�&mt|���BN�:ְ>�`��PO6��B��p l5����'<.�p�=�ٞ��h��'p�I�M�j�=��>��Q�O���ޠ��Mzھj�ل��_����$P 8�}�<��s�*�᰿#�uW'�p$��&y��)��o���H�� kx� �G8s���*�31HA߫�L�޺�pKD��g����ѹ�h�-Ƙ�*�6��nZ+b�F�a~%�}��|�����&X����3��w����@�G�Z��)6寶5[����C���	��q���r1���+�(N�9���D�Q\���(�V# 3�[�+Y"jB��/�;c� ��c�?�`�2�� v��ZS,gm�^������s�1�	`�.��\��y��6`Ɖ<g��� �=��գ�C�[g�1�=�Cq�{��Mt�-�
�#�? �\� v��|o�S�����gޅt�������aa�'�-�<�_�)��W��X�7�3����,���N�����ak7����-�u1� �ӡ&O�*ؤ�3���N�GU>7�Z�)!<tn�by��v���E�������;�_䆐��[�幚m�%q����~,��c�'퍒r��Ԕ�y;وm�fn������)���b�]�=��f��C|Y��<;X�����'+�E�f�]{[0\KD{Ž�g�I&ʹe��<=�ys�qy�iҋe�o7��^�����Oٌי�w�!��eF+��gw9���8�����o�]�B��>����ߩ���W?�2Do�[�
T��#A�h�Z̛D�:UZm��*j9��a���O0�I�ZN� ���:�:ڔbU���񙠬p� ��ޅ�D����f�sԬ_zT��M��U�^A�������� ��� |#j���@�N���+��.�\����k��u.��$�-�}�@|��8}�Ƈ=S�>�o�9��P�ރxK3��h���Ҳ��̝QIP7^��u�9�h�*�S�%�s�
(�t��^�Ou���*y �K��8R������-�������I�-x����_zOBHu�u��9{���Y�8����<9p�_��%��G+�U�ǯ���c��ٿq����~̥
�$(��Q�Om��'"S'���frk\�]��Q�1�m�
*\��r��r�o�%Zq��8�SK��{��5��8S�,>L��TЃ��,�at\���U�Y�q�X2n��C�(
��01؛=&>��Htp�5z��'�������Bj�K��xo�я����l�'׷/ǟ�âs��x�c�Ī���C-�~���4��І���k��U��6��u�ܪ�jJ���j�e��M����G6�?���o�`\>"�`���rr A医 �  �Kw�Z��;�>��y�]��q~Q}�������!�s��_�q~	gc�����M��3��>1�G�4@�)B���e���~E�[v������Wi"O�f����:���|}�n��~��������|_���I�������X6�G9}�>I<�ǛRT������zAy�g�6 �	7�3�9�����bNE::�{�%�����Wvs��Qq��l�$*s%WC����{1��V��[����dy�l	��܉��4��������΅|E�b�õ�Sv���^�+�l�Q��vF7��y�X�h�W�b�O�e�Y&�h���UʳX/2o��Nw�T3�u;�٪&�4�w|9�q��.���������2'�ř*L�X.���9М�6I�e� ����z���+�c�f��Wb�z>��ա_����K�HF$�]���aw�7|)�=9�#�ϖ�R�ky�7��'����[:��@�tKz(�}T] 4m�q�<�hkp�It�?^`++[u�ƘP,u�Ǭ�Du����V�b�q�ש�ƙ�}��ۛ��c����T9�6Ĩ6*�R-��b�@��=N � Dp\���.�]�~^����z�K�b(����o
۶7��m=�o�/��A     