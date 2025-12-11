# EdgesGate Backend - CRUD Generation Rules

This document defines the conventions and rules for generating CRUD functionality in this Laravel + Filament project. Follow these patterns when creating new entities.

## Tech Stack

- **PHP**: ^8.2
- **Laravel**: ^12.0
- **Filament**: ^4.0
- **Database**: SQLite/MySQL (configurable)

---

## 1. Database Migration

**Location**: `database/migrations/YYYY_MM_DD_HHMMSS_create_{tablename}_table.php`

### Naming Convention
- File: `{timestamp}_create_{plural_snake_case}_table.php`
- Table name: plural snake_case (e.g., `services`, `team_members`)

### Structure Template

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('{table_name}', function (Blueprint $table) {
            $table->id();
            // Add your fields here with proper constraints
            // Example patterns:
            // $table->string('name', 100);
            // $table->string('image')->nullable()->comment('Accepts: png, webp, gif, jpg');
            // $table->string('description', 500)->nullable();
            // $table->integer('sort')->default(0);
            // $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('{table_name}');
    }
};
```

### Field Guidelines

| Field Type | Laravel Column | Example |
|------------|----------------|---------|
| Short text (name, title) | `string('field', 100)` | Names, titles |
| Long text | `string('field', 500)` or `text('field')` | Descriptions |
| Image path | `string('image')->nullable()` | File uploads |
| Sort order | `integer('sort')->default(0)` | Ordering |
| Boolean flag | `boolean('is_active')->default(true)` | Status toggles |
| Foreign key | `foreignId('parent_id')->constrained()->cascadeOnDelete()` | Relations |

### Best Practices
- Always set appropriate `maxLength` constraints on strings
- Use `->nullable()` for optional fields
- Add `->comment()` for fields that need clarification
- Use `->default()` for fields with sensible defaults

---

## 2. Eloquent Model

**Location**: `app/Models/{ModelName}.php`

### Naming Convention
- Singular PascalCase (e.g., `Service`, `TeamMember`)

### Structure Template

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class {ModelName} extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'image',
        'description',
        'sort',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sort' => 'integer',
            'is_active' => 'boolean',
            // 'published_at' => 'datetime',
            // 'metadata' => 'array',
        ];
    }

    /**
     * Allowed image extensions for validation.
     */
    public const ALLOWED_IMAGE_EXTENSIONS = ['png', 'webp', 'gif', 'jpg', 'jpeg'];

    /**
     * Scope a query to only include active records.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order by sort column.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort');
    }
}
```

### Required Elements

1. **$fillable**: List ALL mass-assignable fields
2. **casts()**: Define type casting for non-string fields
3. **Constants**: Define validation constants (e.g., allowed file types)
4. **Query Scopes**: Add commonly used query filters
   - `scopeActive()` for `is_active` fields
   - `scopeOrdered()` for `sort` fields

---

## 3. Filament Resource

**Location**: `app/Filament/Resources/{ModelName}Resource.php`

### Structure Template

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\{ModelName}Resource\Pages;
use App\Models\{ModelName};
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class {ModelName}Resource extends Resource
{
    protected static ?string $model = {ModelName}::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-{icon-name}';
    }

    public static function getNavigationGroup(): ?string
    {
        return '{Group Name}';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('{ModelName} Details')
                    ->schema([
                        // Form fields go here
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Table columns go here
            ])
            ->filters([
                // Filters go here
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort', 'asc')
            ->reorderable('sort');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\List{ModelName}s::route('/'),
            'create' => Pages\Create{ModelName}::route('/create'),
            'edit' => Pages\Edit{ModelName}::route('/{record}/edit'),
        ];
    }
}
```

### Form Field Patterns

```php
// Text Input (required)
TextInput::make('name')
    ->required()
    ->maxLength(100)
    ->columnSpanFull(),

// File Upload (image)
FileUpload::make('image')
    ->image()
    ->disk('public')  // Store in public disk for web access
    ->acceptedFileTypes(['image/png', 'image/webp', 'image/gif', 'image/jpeg', 'image/jpg'])
    ->directory('{model_plural}')  // e.g., 'services'
    ->columnSpanFull(),

// Textarea
Textarea::make('description')
    ->maxLength(500)
    ->rows(4)
    ->columnSpanFull(),

// Numeric Input
TextInput::make('sort')
    ->numeric()
    ->default(0)
    ->required(),

// Toggle (boolean)
Toggle::make('is_active')
    ->label('Active')
    ->default(true),

// Select (foreign key)
Select::make('category_id')
    ->relationship('category', 'name')
    ->searchable()
    ->preload()
    ->required(),
```

### Table Column Patterns

```php
// Image Column
ImageColumn::make('image')
    ->square()
    ->size(50),

// Searchable/Sortable Text
TextColumn::make('name')
    ->searchable()
    ->sortable(),

// Limited Text (for long content)
TextColumn::make('description')
    ->limit(50)
    ->searchable(),

// Numeric Column
TextColumn::make('sort')
    ->sortable(),

// Boolean Icon Column
IconColumn::make('is_active')
    ->boolean()
    ->label('Active')
    ->sortable(),

// Timestamp Columns (hidden by default)
TextColumn::make('created_at')
    ->dateTime()
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true),

TextColumn::make('updated_at')
    ->dateTime()
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true),
```

### Filter Patterns

```php
// Boolean/Ternary Filter
TernaryFilter::make('is_active')
    ->label('Active Status'),

// Select Filter
SelectFilter::make('category_id')
    ->relationship('category', 'name'),
```

### Navigation Icons (Heroicons)

Common icons to use:
- `heroicon-o-wrench-screwdriver` - Services
- `heroicon-o-users` - Users/Team
- `heroicon-o-document-text` - Documents/Posts
- `heroicon-o-photo` - Gallery/Media
- `heroicon-o-cog-6-tooth` - Settings
- `heroicon-o-tag` - Categories/Tags
- `heroicon-o-shopping-cart` - Products/Orders

---

## 4. Resource Pages

### Location
`app/Filament/Resources/{ModelName}Resource/Pages/`

### ListRecords Page

**File**: `List{ModelName}s.php`

```php
<?php

namespace App\Filament\Resources\{ModelName}Resource\Pages;

use App\Filament\Resources\{ModelName}Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class List{ModelName}s extends ListRecords
{
    protected static string $resource = {ModelName}Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

### CreateRecord Page

**File**: `Create{ModelName}.php`

```php
<?php

namespace App\Filament\Resources\{ModelName}Resource\Pages;

use App\Filament\Resources\{ModelName}Resource;
use Filament\Resources\Pages\CreateRecord;

class Create{ModelName} extends CreateRecord
{
    protected static string $resource = {ModelName}Resource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
```

### EditRecord Page

**File**: `Edit{ModelName}.php`

```php
<?php

namespace App\Filament\Resources\{ModelName}Resource\Pages;

use App\Filament\Resources\{ModelName}Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class Edit{ModelName} extends EditRecord
{
    protected static string $resource = {ModelName}Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
```

---

## 5. Complete CRUD Generation Checklist

When generating a new CRUD, ensure you create:

- [ ] **Migration**: `database/migrations/YYYY_MM_DD_HHMMSS_create_{tablename}_table.php`
- [ ] **Model**: `app/Models/{ModelName}.php`
- [ ] **Resource**: `app/Filament/Resources/{ModelName}Resource.php`
- [ ] **List Page**: `app/Filament/Resources/{ModelName}Resource/Pages/List{ModelName}s.php`
- [ ] **Create Page**: `app/Filament/Resources/{ModelName}Resource/Pages/Create{ModelName}.php`
- [ ] **Edit Page**: `app/Filament/Resources/{ModelName}Resource/Pages/Edit{ModelName}.php`

---

## 6. Common Patterns Reference

### Standard Fields for Content Entities

Most content entities should include:
```php
// In migration
$table->id();
$table->string('name', 100);               // Required name/title
$table->string('image')->nullable();        // Optional image
$table->string('description', 500)->nullable(); // Optional description
$table->integer('sort')->default(0);        // For ordering
$table->boolean('is_active')->default(true); // For visibility
$table->timestamps();
```

### Navigation Groups

Organize resources into groups:
- `Content Management` - Services, Posts, Pages
- `User Management` - Users, Roles, Permissions
- `Settings` - App settings, Configurations
- `Shop` - Products, Orders, Categories

### File Upload Directories

Store uploads in organized directories:
- Images: `{model_plural}/` (e.g., `services/`, `team-members/`)
- Documents: `documents/{model_plural}/`

---

## 7. AI/Cursor Instructions

When asking AI to generate CRUD, provide:

1. **Entity name** (singular): e.g., "TeamMember"
2. **Fields with types**:
   ```
   - name: string(100), required
   - position: string(100), required  
   - image: string, nullable (image upload)
   - bio: text, nullable
   - sort: integer, default 0
   - is_active: boolean, default true
   ```
3. **Navigation group**: e.g., "Content Management"
4. **Navigation icon**: e.g., "heroicon-o-users"
5. **Any relationships**: e.g., "belongs to Department"

### Example Prompt

```
Create a complete CRUD for "TeamMember" entity with these fields:
- name: string(100), required
- position: string(100), required
- image: string, nullable (accepts png, webp, gif, jpg)
- bio: text(1000), nullable
- email: string(255), nullable
- sort: integer, default 0
- is_active: boolean, default true

Navigation: Group = "Content Management", Icon = "heroicon-o-users", Sort = 2

Follow the patterns in docs.md for this project.
```

---

## 8. Filament 4.0 Specific Notes

### Import Changes from v3 to v4

```php
// Schema namespace changed
use Filament\Schemas\Schema;  // Was: Filament\Forms\Form
use Filament\Schemas\Components\Section;  // Was: Filament\Forms\Components\Section

// Actions are now under Filament\Actions
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
```

### Method Signature

```php
// Form method signature in Filament 4
public static function form(Schema $schema): Schema

// Table method signature (unchanged)
public static function table(Table $table): Table
```

---

## 9. Running Commands After Generation

After generating CRUD files:

```bash
# Run migration
php artisan migrate

# Clear cache (if needed)
php artisan optimize:clear

# Start development server
composer dev
```

---

## 10. File Structure Summary

```
app/
├── Filament/
│   └── Resources/
│       ├── {ModelName}Resource.php
│       └── {ModelName}Resource/
│           └── Pages/
│               ├── Create{ModelName}.php
│               ├── Edit{ModelName}.php
│               └── List{ModelName}s.php
├── Models/
│   └── {ModelName}.php
└── Providers/
    └── Filament/
        └── AdminPanelProvider.php

database/
└── migrations/
    └── YYYY_MM_DD_HHMMSS_create_{tablename}_table.php
```

---

*Last Updated: December 2024*
*Compatible with: Laravel 12, Filament 4.0, PHP 8.2+*

