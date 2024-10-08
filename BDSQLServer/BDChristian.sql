USE [master]
GO
/****** Object:  Database [BDChristian]    Script Date: 10/4/2024 10:36:52 AM ******/
CREATE DATABASE [BDChristian]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'BDChristian', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\BDChristian.mdf' , SIZE = 3136KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'BDChristian_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\BDChristian_log.ldf' , SIZE = 784KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [BDChristian] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [BDChristian].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [BDChristian] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [BDChristian] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [BDChristian] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [BDChristian] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [BDChristian] SET ARITHABORT OFF 
GO
ALTER DATABASE [BDChristian] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [BDChristian] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [BDChristian] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [BDChristian] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [BDChristian] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [BDChristian] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [BDChristian] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [BDChristian] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [BDChristian] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [BDChristian] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [BDChristian] SET  ENABLE_BROKER 
GO
ALTER DATABASE [BDChristian] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [BDChristian] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [BDChristian] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [BDChristian] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [BDChristian] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [BDChristian] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [BDChristian] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [BDChristian] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [BDChristian] SET  MULTI_USER 
GO
ALTER DATABASE [BDChristian] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [BDChristian] SET DB_CHAINING OFF 
GO
ALTER DATABASE [BDChristian] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [BDChristian] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
USE [BDChristian]
GO
/****** Object:  Table [dbo].[Persona]    Script Date: 10/4/2024 10:36:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Persona](
	[id_persona] [int] IDENTITY(1,1) NOT NULL,
	[ci] [varchar](50) NULL,
	[nombres] [varchar](50) NULL,
	[aPaterno] [varchar](50) NULL,
	[aMaterno] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_persona] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Propiedad]    Script Date: 10/4/2024 10:36:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Propiedad](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[codCatastral] [varchar](10) NULL,
	[direccion] [varchar](255) NULL,
	[distrito] [int] NULL,
	[zona] [varchar](100) NULL,
	[superficie] [decimal](10, 2) NULL,
	[xIni] [decimal](10, 2) NULL,
	[yIni] [decimal](10, 2) NULL,
	[xFin] [decimal](10, 2) NULL,
	[yFin] [decimal](10, 2) NULL,
	[tipoPropiedad] [varchar](50) NULL,
	[valor] [decimal](15, 2) NULL,
	[id_persona] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Usuario]    Script Date: 10/4/2024 10:36:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Usuario](
	[id_usuario] [int] IDENTITY(1,1) NOT NULL,
	[ci] [varchar](20) NULL,
	[password] [varchar](255) NULL,
	[rol] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Persona] ON 

INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (1, N'12345678', N'Juan', N'Pérez', N'Gómez')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (2, N'87654321', N'María', N'García', N'López')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (3, N'11223344', N'Carlos', N'Martínez', N'Hernández')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (4, N'44332211', N'Ana', N'Torres', N'Suárez')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (5, N'55667788', N'Luis', N'Ramírez', N'Alvarez')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (6, N'99887766', N'Laura', N'Fernández', N'Jiménez')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (7, N'22334455', N'Sofía', N'Mendoza', N'Ríos')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (8, N'33445566', N'Fernando', N'Bermúdez', N'Soto')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (9, N'44556677', N'Pedro', N'Reyes', N'Márquez')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (10, N'66778899', N'Claudia', N'Cruz', N'Salazar')
INSERT [dbo].[Persona] ([id_persona], [ci], [nombres], [aPaterno], [aMaterno]) VALUES (12, N'4288316', N'Christian', N'Medina', N'Juarez')
SET IDENTITY_INSERT [dbo].[Persona] OFF
SET IDENTITY_INSERT [dbo].[Propiedad] ON 

INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (1, N'CP001', N'Av. Siempre Viva 742', 1, N'Zona Norte', CAST(120.50 AS Decimal(10, 2)), CAST(50.00 AS Decimal(10, 2)), CAST(50.00 AS Decimal(10, 2)), CAST(100.00 AS Decimal(10, 2)), CAST(100.00 AS Decimal(10, 2)), N'Casa', CAST(150000.00 AS Decimal(15, 2)), 1)
INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (2, N'CP002', N'Calle Los Olivos 123', 1, N'Zona Norte', CAST(250.75 AS Decimal(10, 2)), CAST(100.00 AS Decimal(10, 2)), CAST(100.00 AS Decimal(10, 2)), CAST(200.00 AS Decimal(10, 2)), CAST(200.00 AS Decimal(10, 2)), N'Terreno', CAST(250000.00 AS Decimal(15, 2)), 1)
INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (3, N'CP003', N'Calle de la Paz 456', 2, N'Zona Sur', CAST(180.00 AS Decimal(10, 2)), CAST(30.00 AS Decimal(10, 2)), CAST(30.00 AS Decimal(10, 2)), CAST(90.00 AS Decimal(10, 2)), CAST(90.00 AS Decimal(10, 2)), N'Casa', CAST(180000.00 AS Decimal(15, 2)), 2)
INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (4, N'CP002', N'Av. Libertador 789', 2, N'Zona Sur', CAST(300.00 AS Decimal(10, 2)), CAST(110.00 AS Decimal(10, 2)), CAST(110.00 AS Decimal(10, 2)), CAST(200.00 AS Decimal(10, 2)), CAST(200.00 AS Decimal(10, 2)), N'Terreno', CAST(320000.00 AS Decimal(15, 2)), 2)
INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (5, N'CP003', N'Calle Central 123', 3, N'Zona Este', CAST(150.00 AS Decimal(10, 2)), CAST(40.00 AS Decimal(10, 2)), CAST(40.00 AS Decimal(10, 2)), CAST(90.00 AS Decimal(10, 2)), CAST(90.00 AS Decimal(10, 2)), N'Casa', CAST(220000.00 AS Decimal(15, 2)), 3)
INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (6, N'CP001', N'Calle Secundaria 321', 3, N'Zona Este', CAST(220.50 AS Decimal(10, 2)), CAST(60.00 AS Decimal(10, 2)), CAST(60.00 AS Decimal(10, 2)), CAST(130.00 AS Decimal(10, 2)), CAST(130.00 AS Decimal(10, 2)), N'Departamento', CAST(250000.00 AS Decimal(15, 2)), 4)
INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (7, N'CP002', N'Calle Nueva 234', 4, N'Zona Oeste', CAST(300.00 AS Decimal(10, 2)), CAST(50.00 AS Decimal(10, 2)), CAST(50.00 AS Decimal(10, 2)), CAST(150.00 AS Decimal(10, 2)), CAST(150.00 AS Decimal(10, 2)), N'Casa', CAST(200000.00 AS Decimal(15, 2)), 5)
INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (8, N'CP001', N'Av. del Sol 987', 4, N'Zona Oeste', CAST(450.00 AS Decimal(10, 2)), CAST(80.00 AS Decimal(10, 2)), CAST(80.00 AS Decimal(10, 2)), CAST(200.00 AS Decimal(10, 2)), CAST(200.00 AS Decimal(10, 2)), N'Terreno', CAST(500000.00 AS Decimal(15, 2)), 6)
INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (9, N'CP001', N'Calle La Paz 111', 5, N'Zona Centro', CAST(160.00 AS Decimal(10, 2)), CAST(20.00 AS Decimal(10, 2)), CAST(20.00 AS Decimal(10, 2)), CAST(80.00 AS Decimal(10, 2)), CAST(80.00 AS Decimal(10, 2)), N'Casa', CAST(170000.00 AS Decimal(15, 2)), 7)
INSERT [dbo].[Propiedad] ([id], [codCatastral], [direccion], [distrito], [zona], [superficie], [xIni], [yIni], [xFin], [yFin], [tipoPropiedad], [valor], [id_persona]) VALUES (10, N'CP001', N'Calle del Mercado 222', 5, N'Zona Centro', CAST(200.00 AS Decimal(10, 2)), CAST(25.00 AS Decimal(10, 2)), CAST(25.00 AS Decimal(10, 2)), CAST(90.00 AS Decimal(10, 2)), CAST(90.00 AS Decimal(10, 2)), N'Departamento', CAST(190000.00 AS Decimal(15, 2)), 8)
SET IDENTITY_INSERT [dbo].[Propiedad] OFF
SET IDENTITY_INSERT [dbo].[Usuario] ON 

INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (1, N'12345678', N'12345678', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (2, N'87654321', N'87654321', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (3, N'11223344', N'11223344', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (4, N'44332211', N'44332211', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (5, N'55667788', N'55667788', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (6, N'99887766', N'99887766', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (7, N'22334455', N'22334455', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (8, N'33445566', N'33445566', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (9, N'44556677', N'44556677', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (10, N'66778899', N'66778899', N'persona')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (11, N'4288316', N'4288316', N'funcionario')
INSERT [dbo].[Usuario] ([id_usuario], [ci], [password], [rol]) VALUES (12, N'9201571', N'9201571', N'persona')
SET IDENTITY_INSERT [dbo].[Usuario] OFF
SET ANSI_PADDING ON

GO
/****** Object:  Index [UQ__Persona__32136662C285348D]    Script Date: 10/4/2024 10:36:52 AM ******/
ALTER TABLE [dbo].[Persona] ADD UNIQUE NONCLUSTERED 
(
	[ci] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
SET ANSI_PADDING ON

GO
/****** Object:  Index [UQ__Usuario__32136662E2A1D4BC]    Script Date: 10/4/2024 10:36:52 AM ******/
ALTER TABLE [dbo].[Usuario] ADD UNIQUE NONCLUSTERED 
(
	[ci] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Propiedad]  WITH CHECK ADD FOREIGN KEY([id_persona])
REFERENCES [dbo].[Persona] ([id_persona])
ON DELETE CASCADE
GO
USE [master]
GO
ALTER DATABASE [BDChristian] SET  READ_WRITE 
GO
