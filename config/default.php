<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\ArrayNotation\TrimArraySpacesFixer;
use PhpCsFixer\Fixer\AttributeNotation\AttributeEmptyParenthesesFixer;
use PhpCsFixer\Fixer\Basic\NoTrailingCommaInSinglelineFixer;
use PhpCsFixer\Fixer\Basic\SingleLineEmptyBodyFixer;
use PhpCsFixer\Fixer\Casing\ClassReferenceNameCasingFixer;
use PhpCsFixer\Fixer\Casing\MagicMethodCasingFixer;
use PhpCsFixer\Fixer\Casing\NativeFunctionCasingFixer;
use PhpCsFixer\Fixer\Casing\NativeTypeDeclarationCasingFixer;
use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\ClassNotation\FinalClassFixer;
use PhpCsFixer\Fixer\ClassNotation\NoNullPropertyInitializationFixer;
use PhpCsFixer\Fixer\ClassNotation\NoUnneededFinalMethodFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedTypesFixer;
use PhpCsFixer\Fixer\ClassNotation\ProtectedToPrivateFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfStaticAccessorFixer;
use PhpCsFixer\Fixer\ClassUsage\DateTimeImmutableFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededBracesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededControlParenthesesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUselessElseFixer;
use PhpCsFixer\Fixer\ControlStructure\SimplifiedIfReturnFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\Import\FullyQualifiedStrictTypesFixer;
use PhpCsFixer\Fixer\Import\GlobalNamespaceImportFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Operator\AssignNullCoalescingToCoalesceEqualFixer;
use PhpCsFixer\Fixer\Operator\NewWithParenthesesFixer;
use PhpCsFixer\Fixer\Operator\NoUselessConcatOperatorFixer;
use PhpCsFixer\Fixer\Operator\NoUselessNullsafeOperatorFixer;
use PhpCsFixer\Fixer\Operator\ObjectOperatorWithoutWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\TernaryToElvisOperatorFixer;
use PhpCsFixer\Fixer\Operator\TernaryToNullCoalescingFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitConstructFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertInternalTypeFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitExpectationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitMethodCasingFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\Strict\StrictComparisonFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\TypeDeclarationSpacesFixer;
use PhpCsFixer\Fixer\Whitespace\TypesSpacesFixer;
use Symplify\CodingStandard\Fixer\LineLength\LineLengthFixer;
use Symplify\CodingStandard\Fixer\Strict\BlankLineAfterStrictTypesFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPreparedSets(psr12: true)
    ->withRules([
        // Imports
        NoUnusedImportsFixer::class,
        FullyQualifiedStrictTypesFixer::class,
        GlobalNamespaceImportFixer::class,

        // Arrays
        TrimArraySpacesFixer::class,
        ArrayIndentationFixer::class,

        // Blank lines
        BlankLineAfterStrictTypesFixer::class,

        // Spacing
        SingleLineEmptyBodyFixer::class,
        CastSpacesFixer::class,
        TypeDeclarationSpacesFixer::class,

        // // Casing
        ClassReferenceNameCasingFixer::class,
        MagicMethodCasingFixer::class,
        NativeFunctionCasingFixer::class,
        NativeTypeDeclarationCasingFixer::class,

        // // Architecture
        FinalClassFixer::class,
        ProtectedToPrivateFixer::class,
        DateTimeImmutableFixer::class,
        NoUselessElseFixer::class,

        // // Operator
        AssignNullCoalescingToCoalesceEqualFixer::class,
        NoUselessConcatOperatorFixer::class,
        NoUselessNullsafeOperatorFixer::class,
        ObjectOperatorWithoutWhitespaceFixer::class,
        TernaryToElvisOperatorFixer::class,
        TernaryToNullCoalescingFixer::class,

        // // Testing
        PhpUnitConstructFixer::class,
        PhpUnitDedicateAssertFixer::class,
        PhpUnitDedicateAssertInternalTypeFixer::class,
        PhpUnitExpectationFixer::class,

        // // Other
        LineLengthFixer::class,
        NoNullPropertyInitializationFixer::class,
        NoUnneededFinalMethodFixer::class,
        SelfAccessorFixer::class,
        SelfStaticAccessorFixer::class,
        NoUnneededControlParenthesesFixer::class,
        NoUnneededBracesFixer::class,
        SimplifiedIfReturnFixer::class,
        TrailingCommaInMultilineFixer::class,
        NoTrailingCommaInSinglelineFixer::class,
        DeclareStrictTypesFixer::class,
        StrictComparisonFixer::class,
        SingleQuoteFixer::class,
        AttributeEmptyParenthesesFixer::class,
    ])
    ->withConfiguredRule(ArraySyntaxFixer::class, ['syntax' => 'short'])
    ->withConfiguredRule(TypesSpacesFixer::class, ['space' => 'single', 'space_multiple_catch' => 'single'])
    ->withConfiguredRule(OrderedTypesFixer::class, ['null_adjustment' => 'always_last'])
    ->withConfiguredRule(YodaStyleFixer::class, ['equal' => false, 'identical' => false, 'less_and_greater' => false])
    ->withConfiguredRule(NewWithParenthesesFixer::class, ['anonymous_class' => false])
    ->withConfiguredRule(PhpUnitMethodCasingFixer::class, ['case' => 'snake_case'])
;
