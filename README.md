# Booker - This is a test project

1. 新建一個 Model
2. 以此產生 CRUD 功能，以 API 方式呈現
3. 將 Model 建立 BelongsTo, HasMany, BelongsToMany 的關聯，建立對應關係需要的 Model
4. 針對 API 撰寫出一份 SD 文件，功能情境不拘
5. 程式架構做到最大的沿用性，並於 Readme 說明你的想法

<hr>

# 需求情境

-   主要有三個 Model：Book、BookCategory、BookTag 分別代表書本、書本類別、書本標籤
-   一本書本屬於一個書本類別, 一個書本類別有許多書本（BelongsTo、HasMany）
-   一本書本有許多書本標籤, 一個書本標籤有許多書本（BelongsToMany）

# 程式架構

-   在原有的 MVC 架構上加上 Service、Repostiory、Presenter 等用法, 可隨時根據業務邏輯需求擴充功能：Request 進來後先經由一層 before middleware 做初步統一處理, 而後交由 Controller 去做總控, 若業務邏輯複雜, 則將該部分放置於 Service 並由 Controller 呼叫 function 執行；將資料庫邏輯抽換到 Repository 層做管理, 凡有執行到資料庫邏輯則將這塊在 Controller 或者 Service 呼叫 Repository 內的 function 處理, 處理完業務邏輯後將資料透過 Resource 包裝為 API 需要的架構, 並加入 Presenter 去做資料 format, 最後透過統一控管的 ApiResponse 內部 function 將 API 回傳結構做統一管理.
