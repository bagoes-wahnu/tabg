PGDMP     )                	    z            slf_tabg_pertelaan    10.22    10.22     ?
           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            ?
           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            ?
           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            ?            1259    66774    tabg    TABLE     ?  CREATE TABLE public.tabg (
    gid integer NOT NULL,
    tgl_tabg date,
    no_telp_pemohon bigint,
    nama_kuasa character varying(255),
    no_telp_kuasa bigint,
    kode_verifikasi character varying(255),
    nama_proyek character varying(255),
    penggunaan_bangunan character varying(255),
    alamat_persil character varying(255),
    kelurahan character varying(255),
    kecamatan character varying(255),
    no_imb character varying(255),
    tgl_jam_sidang timestamp without time zone,
    tempat_sidang character varying(255),
    file_gambar_ars character varying(255),
    file_gambar_str character varying(255),
    file_gambar_mep character varying(255),
    file_laporan_struktur character varying(255),
    nama_pemohon character varying(255)
);
    DROP TABLE public.tabg;
       public         postgres    false            ?
          0    66774    tabg 
   TABLE DATA               0  COPY public.tabg (gid, tgl_tabg, no_telp_pemohon, nama_kuasa, no_telp_kuasa, kode_verifikasi, nama_proyek, penggunaan_bangunan, alamat_persil, kelurahan, kecamatan, no_imb, tgl_jam_sidang, tempat_sidang, file_gambar_ars, file_gambar_str, file_gambar_mep, file_laporan_struktur, nama_pemohon) FROM stdin;
    public       postgres    false    197   ?       u
           2606    66781    tabg tabg_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY public.tabg
    ADD CONSTRAINT tabg_pkey PRIMARY KEY (gid);
 8   ALTER TABLE ONLY public.tabg DROP CONSTRAINT tabg_pkey;
       public         postgres    false    197            ?
   @   x?3?4202?54?50??042? Β?bd.LF?``iejheW??U???.HI?\1z\\\ +8"3     