<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Alias\ArrayPushFixer;
use PhpCsFixer\Fixer\Alias\EregToPregFixer;
use PhpCsFixer\Fixer\Alias\NoAliasFunctionsFixer;
use PhpCsFixer\Fixer\Alias\NoAliasLanguageConstructCallFixer;
use PhpCsFixer\Fixer\Alias\PowToExponentiationFixer;
use PhpCsFixer\Fixer\Alias\SetTypeToCastFixer;
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoMultilineWhitespaceAroundDoubleArrowFixer;
use PhpCsFixer\Fixer\ArrayNotation\NormalizeIndexBraceFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoWhitespaceBeforeCommaInArrayFixer;
use PhpCsFixer\Fixer\ArrayNotation\TrimArraySpacesFixer;
use PhpCsFixer\Fixer\ArrayNotation\WhitespaceAfterCommaInArrayFixer;
use PhpCsFixer\Fixer\AttributeNotation\AttributeEmptyParenthesesFixer;
use PhpCsFixer\Fixer\Basic\BracesPositionFixer;
use PhpCsFixer\Fixer\Basic\EncodingFixer;
use PhpCsFixer\Fixer\Basic\NoMultipleStatementsPerLineFixer;
use PhpCsFixer\Fixer\Basic\NoTrailingCommaInSinglelineFixer;
use PhpCsFixer\Fixer\Basic\SingleLineEmptyBodyFixer;
use PhpCsFixer\Fixer\Casing\ClassReferenceNameCasingFixer;
use PhpCsFixer\Fixer\Casing\ConstantCaseFixer;
use PhpCsFixer\Fixer\Casing\IntegerLiteralCaseFixer;
use PhpCsFixer\Fixer\Casing\LowercaseKeywordsFixer;
use PhpCsFixer\Fixer\Casing\LowercaseStaticReferenceFixer;
use PhpCsFixer\Fixer\Casing\MagicConstantCasingFixer;
use PhpCsFixer\Fixer\Casing\MagicMethodCasingFixer;
use PhpCsFixer\Fixer\Casing\NativeFunctionCasingFixer;
use PhpCsFixer\Fixer\Casing\NativeTypeDeclarationCasingFixer;
use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\CastNotation\LowercaseCastFixer;
use PhpCsFixer\Fixer\CastNotation\ModernizeTypesCastingFixer;
use PhpCsFixer\Fixer\CastNotation\NoUnsetCastFixer;
use PhpCsFixer\Fixer\CastNotation\ShortScalarCastFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer;
use PhpCsFixer\Fixer\ClassNotation\FinalClassFixer;
use PhpCsFixer\Fixer\ClassNotation\FinalPublicMethodForAbstractClassFixer;
use PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer;
use PhpCsFixer\Fixer\ClassNotation\NoNullPropertyInitializationFixer;
use PhpCsFixer\Fixer\ClassNotation\NoUnneededFinalMethodFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedTraitsFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedTypesFixer;
use PhpCsFixer\Fixer\ClassNotation\PhpdocReadonlyClassCommentToKeywordFixer;
use PhpCsFixer\Fixer\ClassNotation\ProtectedToPrivateFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfStaticAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleClassElementPerStatementFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleTraitInsertPerStatementFixer;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\ClassUsage\DateTimeImmutableFixer;
use PhpCsFixer\Fixer\Comment\CommentToPhpdocFixer;
use PhpCsFixer\Fixer\Comment\MultilineCommentOpeningClosingFixer;
use PhpCsFixer\Fixer\Comment\NoEmptyCommentFixer;
use PhpCsFixer\Fixer\Comment\NoTrailingWhitespaceInCommentFixer;
use PhpCsFixer\Fixer\Comment\SingleLineCommentSpacingFixer;
use PhpCsFixer\Fixer\Comment\SingleLineCommentStyleFixer;
use PhpCsFixer\Fixer\ControlStructure\ControlStructureBracesFixer;
use PhpCsFixer\Fixer\ControlStructure\ControlStructureContinuationPositionFixer;
use PhpCsFixer\Fixer\ControlStructure\ElseifFixer;
use PhpCsFixer\Fixer\ControlStructure\EmptyLoopConditionFixer;
use PhpCsFixer\Fixer\ControlStructure\IncludeFixer;
use PhpCsFixer\Fixer\ControlStructure\NoAlternativeSyntaxFixer;
use PhpCsFixer\Fixer\ControlStructure\NoBreakCommentFixer;
use PhpCsFixer\Fixer\ControlStructure\NoSuperfluousElseifFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededBracesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededControlParenthesesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUselessElseFixer;
use PhpCsFixer\Fixer\ControlStructure\SimplifiedIfReturnFixer;
use PhpCsFixer\Fixer\ControlStructure\SwitchCaseSemicolonToColonFixer;
use PhpCsFixer\Fixer\ControlStructure\SwitchCaseSpaceFixer;
use PhpCsFixer\Fixer\ControlStructure\SwitchContinueToBreakFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\FunctionNotation\CombineNestedDirnameFixer;
use PhpCsFixer\Fixer\FunctionNotation\FopenFlagOrderFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\ImplodeCallFixer;
use PhpCsFixer\Fixer\FunctionNotation\LambdaNotUsedImportFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\NoSpacesAfterFunctionNameFixer;
use PhpCsFixer\Fixer\FunctionNotation\NoUselessSprintfFixer;
use PhpCsFixer\Fixer\FunctionNotation\NullableTypeDeclarationForDefaultNullValueFixer;
use PhpCsFixer\Fixer\FunctionNotation\RegularCallableCallFixer;
use PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\UseArrowFunctionsFixer;
use PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer;
use PhpCsFixer\Fixer\Import\FullyQualifiedStrictTypesFixer;
use PhpCsFixer\Fixer\Import\GlobalNamespaceImportFixer;
use PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer;
use PhpCsFixer\Fixer\Import\NoUnneededImportAliasFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\Import\SingleImportPerStatementFixer;
use PhpCsFixer\Fixer\Import\SingleLineAfterImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveIssetsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveUnsetsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\DeclareEqualNormalizeFixer;
use PhpCsFixer\Fixer\LanguageConstruct\DeclareParenthesesFixer;
use PhpCsFixer\Fixer\LanguageConstruct\DirConstantFixer;
use PhpCsFixer\Fixer\LanguageConstruct\ExplicitIndirectVariableFixer;
use PhpCsFixer\Fixer\LanguageConstruct\FunctionToConstantFixer;
use PhpCsFixer\Fixer\LanguageConstruct\GetClassToClassKeywordFixer;
use PhpCsFixer\Fixer\LanguageConstruct\IsNullFixer;
use PhpCsFixer\Fixer\LanguageConstruct\NoUnsetOnPropertyFixer;
use PhpCsFixer\Fixer\LanguageConstruct\NullableTypeDeclarationFixer;
use PhpCsFixer\Fixer\LanguageConstruct\SingleSpaceAroundConstructFixer;
use PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer;
use PhpCsFixer\Fixer\NamespaceNotation\BlankLineAfterNamespaceFixer;
use PhpCsFixer\Fixer\NamespaceNotation\BlankLinesBeforeNamespaceFixer;
use PhpCsFixer\Fixer\NamespaceNotation\CleanNamespaceFixer;
use PhpCsFixer\Fixer\NamespaceNotation\NoLeadingNamespaceWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\AssignNullCoalescingToCoalesceEqualFixer;
use PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Operator\IncrementStyleFixer;
use PhpCsFixer\Fixer\Operator\LogicalOperatorsFixer;
use PhpCsFixer\Fixer\Operator\NewWithParenthesesFixer;
use PhpCsFixer\Fixer\Operator\NoSpaceAroundDoubleColonFixer;
use PhpCsFixer\Fixer\Operator\NoUselessConcatOperatorFixer;
use PhpCsFixer\Fixer\Operator\NoUselessNullsafeOperatorFixer;
use PhpCsFixer\Fixer\Operator\ObjectOperatorWithoutWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\OperatorLinebreakFixer;
use PhpCsFixer\Fixer\Operator\StandardizeIncrementFixer;
use PhpCsFixer\Fixer\Operator\StandardizeNotEqualsFixer;
use PhpCsFixer\Fixer\Operator\TernaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\TernaryToElvisOperatorFixer;
use PhpCsFixer\Fixer\Operator\TernaryToNullCoalescingFixer;
use PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Phpdoc\AlignMultilineCommentFixer;
use PhpCsFixer\Fixer\Phpdoc\NoBlankLinesAfterPhpdocFixer;
use PhpCsFixer\Fixer\Phpdoc\NoEmptyPhpdocFixer;
use PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAnnotationWithoutDotFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocArrayTypeFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocLineSpanFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoAccessFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoAliasTagFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoPackageFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoUselessInheritdocFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocParamOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocScalarFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSeparationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSingleLineVarSpacingFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocToCommentFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimConsecutiveBlankLineSeparationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTypesFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTypesOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocVarAnnotationCorrectOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocVarWithoutNameFixer;
use PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer;
use PhpCsFixer\Fixer\PhpTag\FullOpeningTagFixer;
use PhpCsFixer\Fixer\PhpTag\LinebreakAfterOpeningTagFixer;
use PhpCsFixer\Fixer\PhpTag\NoClosingTagFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitConstructFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertInternalTypeFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitExpectationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitMethodCasingFixer;
use PhpCsFixer\Fixer\ReturnNotation\NoUselessReturnFixer;
use PhpCsFixer\Fixer\ReturnNotation\ReturnAssignmentFixer;
use PhpCsFixer\Fixer\ReturnNotation\SimplifiedNullReturnFixer;
use PhpCsFixer\Fixer\Semicolon\MultilineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\NoEmptyStatementFixer;
use PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\SemicolonAfterInstructionFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\Strict\StrictComparisonFixer;
use PhpCsFixer\Fixer\StringNotation\ExplicitStringVariableFixer;
use PhpCsFixer\Fixer\StringNotation\NoBinaryStringFixer;
use PhpCsFixer\Fixer\StringNotation\SimpleToComplexStringVariableFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use PhpCsFixer\Fixer\StringNotation\StringImplicitBackslashesFixer;
use PhpCsFixer\Fixer\StringNotation\StringLengthToEmptyFixer;
use PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\BlankLineBetweenImportGroupsFixer;
use PhpCsFixer\Fixer\Whitespace\CompactNullableTypeDeclarationFixer;
use PhpCsFixer\Fixer\Whitespace\IndentationTypeFixer;
use PhpCsFixer\Fixer\Whitespace\LineEndingFixer;
use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\NoExtraBlankLinesFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesAroundOffsetFixer;
use PhpCsFixer\Fixer\Whitespace\NoTrailingWhitespaceFixer;
use PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer;
use PhpCsFixer\Fixer\Whitespace\SingleBlankLineAtEofFixer;
use PhpCsFixer\Fixer\Whitespace\SpacesInsideParenthesesFixer;
use PhpCsFixer\Fixer\Whitespace\StatementIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\TypeDeclarationSpacesFixer;
use PhpCsFixer\Fixer\Whitespace\TypesSpacesFixer;
use Symplify\CodingStandard\Fixer\Strict\BlankLineAfterStrictTypesFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withRules([
        // Alias
        ArrayPushFixer::class,
        EregToPregFixer::class,
        NoAliasFunctionsFixer::class,
        NoAliasLanguageConstructCallFixer::class,
        PowToExponentiationFixer::class,
        SetTypeToCastFixer::class,

        // Array
        ArraySyntaxFixer::class,
        NoMultilineWhitespaceAroundDoubleArrowFixer::class,
        NoWhitespaceBeforeCommaInArrayFixer::class,
        NormalizeIndexBraceFixer::class,
        TrimArraySpacesFixer::class,

        // Attribute Notation
        AttributeEmptyParenthesesFixer::class,

        // Basic
        EncodingFixer::class,
        NoMultipleStatementsPerLineFixer::class,
        NoTrailingCommaInSinglelineFixer::class,
        SingleLineEmptyBodyFixer::class,

        // Casing
        ClassReferenceNameCasingFixer::class,
        ConstantCaseFixer::class,
        IntegerLiteralCaseFixer::class,
        LowercaseKeywordsFixer::class,
        LowercaseStaticReferenceFixer::class,
        MagicConstantCasingFixer::class,
        MagicMethodCasingFixer::class,
        NativeFunctionCasingFixer::class,
        NativeTypeDeclarationCasingFixer::class,

        // Cast Notation
        CastSpacesFixer::class,
        LowercaseCastFixer::class,
        ModernizeTypesCastingFixer::class,
        NoUnsetCastFixer::class,
        ShortScalarCastFixer::class,

        // Class Notation
        ClassAttributesSeparationFixer::class,
        FinalClassFixer::class,
        FinalPublicMethodForAbstractClassFixer::class,
        NoBlankLinesAfterClassOpeningFixer::class,
        NoNullPropertyInitializationFixer::class,
        NoUnneededFinalMethodFixer::class,
        OrderedTraitsFixer::class,
        PhpdocReadonlyClassCommentToKeywordFixer::class,
        ProtectedToPrivateFixer::class,
        SelfAccessorFixer::class,
        SelfStaticAccessorFixer::class,
        SingleClassElementPerStatementFixer::class,
        SingleTraitInsertPerStatementFixer::class,
        VisibilityRequiredFixer::class,

        // Class Usage
        DateTimeImmutableFixer::class,

        // Comment
        CommentToPhpdocFixer::class,
        MultilineCommentOpeningClosingFixer::class,
        NoEmptyCommentFixer::class,
        NoTrailingWhitespaceInCommentFixer::class,
        SingleLineCommentSpacingFixer::class,
        SingleLineCommentStyleFixer::class,

        // Control Structure
        ControlStructureBracesFixer::class,
        ControlStructureContinuationPositionFixer::class,
        ElseifFixer::class,
        EmptyLoopConditionFixer::class,
        IncludeFixer::class,
        NoAlternativeSyntaxFixer::class,
        NoBreakCommentFixer::class,
        NoSuperfluousElseifFixer::class,
        NoUnneededControlParenthesesFixer::class,
        NoUselessElseFixer::class,
        SimplifiedIfReturnFixer::class,
        SwitchCaseSemicolonToColonFixer::class,
        SwitchCaseSpaceFixer::class,
        SwitchContinueToBreakFixer::class,

        // Function Notation
        CombineNestedDirnameFixer::class,
        FopenFlagOrderFixer::class,
        FunctionDeclarationFixer::class,
        ImplodeCallFixer::class,
        LambdaNotUsedImportFixer::class,
        MethodArgumentSpaceFixer::class,
        NoSpacesAfterFunctionNameFixer::class,
        NoUselessSprintfFixer::class,
        NullableTypeDeclarationForDefaultNullValueFixer::class,
        RegularCallableCallFixer::class,
        ReturnTypeDeclarationFixer::class,
        UseArrowFunctionsFixer::class,
        VoidReturnFixer::class,

        // Import
        FullyQualifiedStrictTypesFixer::class,
        GlobalNamespaceImportFixer::class,
        NoLeadingImportSlashFixer::class,
        NoUnneededImportAliasFixer::class,
        NoUnusedImportsFixer::class,
        SingleImportPerStatementFixer::class,
        SingleLineAfterImportsFixer::class,

        // Language Construct
        CombineConsecutiveIssetsFixer::class,
        CombineConsecutiveUnsetsFixer::class,
        DeclareEqualNormalizeFixer::class,
        DeclareParenthesesFixer::class,
        DirConstantFixer::class,
        ExplicitIndirectVariableFixer::class,
        FunctionToConstantFixer::class,
        GetClassToClassKeywordFixer::class,
        IsNullFixer::class,
        NoUnsetOnPropertyFixer::class,
        NullableTypeDeclarationFixer::class,
        SingleSpaceAroundConstructFixer::class,

        // List Notation
        ListSyntaxFixer::class,

        // Namespace Notation
        BlankLineAfterNamespaceFixer::class,
        BlankLinesBeforeNamespaceFixer::class,
        CleanNamespaceFixer::class,
        NoLeadingNamespaceWhitespaceFixer::class,

        // Operator
        AssignNullCoalescingToCoalesceEqualFixer::class,
        BinaryOperatorSpacesFixer::class,
        ConcatSpaceFixer::class,
        LogicalOperatorsFixer::class,
        NoSpaceAroundDoubleColonFixer::class,
        NoUselessConcatOperatorFixer::class,
        NoUselessNullsafeOperatorFixer::class,
        ObjectOperatorWithoutWhitespaceFixer::class,
        OperatorLinebreakFixer::class,
        StandardizeIncrementFixer::class,
        StandardizeNotEqualsFixer::class,
        TernaryOperatorSpacesFixer::class,
        TernaryToElvisOperatorFixer::class,
        TernaryToNullCoalescingFixer::class,
        UnaryOperatorSpacesFixer::class,

        // PHP Tag
        BlankLineAfterOpeningTagFixer::class,
        FullOpeningTagFixer::class,
        LinebreakAfterOpeningTagFixer::class,
        NoClosingTagFixer::class,

        // PHPDoc
        AlignMultilineCommentFixer::class,
        NoBlankLinesAfterPhpdocFixer::class,
        NoEmptyPhpdocFixer::class,
        NoSuperfluousPhpdocTagsFixer::class,
        PhpdocAnnotationWithoutDotFixer::class,
        PhpdocArrayTypeFixer::class,
        PhpdocLineSpanFixer::class,
        PhpdocNoAccessFixer::class,
        PhpdocNoAliasTagFixer::class,
        PhpdocNoPackageFixer::class,
        PhpdocNoUselessInheritdocFixer::class,
        PhpdocParamOrderFixer::class,
        PhpdocScalarFixer::class,
        PhpdocSeparationFixer::class,
        PhpdocSingleLineVarSpacingFixer::class,
        PhpdocToCommentFixer::class,
        PhpdocTrimConsecutiveBlankLineSeparationFixer::class,
        PhpdocTrimFixer::class,
        PhpdocTypesFixer::class,
        PhpdocVarAnnotationCorrectOrderFixer::class,
        PhpdocVarWithoutNameFixer::class,

        // PHPUnit
        PhpUnitConstructFixer::class,
        PhpUnitDedicateAssertFixer::class,
        PhpUnitDedicateAssertInternalTypeFixer::class,
        PhpUnitExpectationFixer::class,

        // Return Notation
        NoUselessReturnFixer::class,
        ReturnAssignmentFixer::class,
        SimplifiedNullReturnFixer::class,

        // Semicolon
        NoEmptyStatementFixer::class,
        NoSinglelineWhitespaceBeforeSemicolonsFixer::class,
        SemicolonAfterInstructionFixer::class,

        // Strict
        BlankLineAfterStrictTypesFixer::class,
        DeclareStrictTypesFixer::class,
        StrictComparisonFixer::class,

        // String Notation
        ExplicitStringVariableFixer::class,
        NoBinaryStringFixer::class,
        SimpleToComplexStringVariableFixer::class,
        SingleQuoteFixer::class,
        StringLengthToEmptyFixer::class,

        // Whitespace
        ArrayIndentationFixer::class,
        BlankLineBetweenImportGroupsFixer::class,
        CompactNullableTypeDeclarationFixer::class,
        IndentationTypeFixer::class,
        LineEndingFixer::class,
        MethodChainingIndentationFixer::class,
        NoSpacesAroundOffsetFixer::class,
        SpacesInsideParenthesesFixer::class,
        NoTrailingWhitespaceFixer::class,
        NoWhitespaceInBlankLineFixer::class,
        SingleBlankLineAtEofFixer::class,
        StatementIndentationFixer::class,
        TypeDeclarationSpacesFixer::class,
    ])
    // Array Notation
    ->withConfiguredRule(WhitespaceAfterCommaInArrayFixer::class, ['ensure_single_space' => true])
    // Basic
    ->withConfiguredRule(
        BracesPositionFixer::class,
        ['anonymous_classes_opening_brace' => 'next_line_unless_newline_at_signature_end'],
    )
    // Class Notation
    ->withConfiguredRule(ClassDefinitionFixer::class, ['single_line' => true])
    ->withConfiguredRule(OrderedTypesFixer::class, ['null_adjustment' => 'always_last'])
    // Control Structure
    ->withConfiguredRule(NoUnneededBracesFixer::class, ['namespaces' => true])
    ->withConfiguredRule(
        TrailingCommaInMultilineFixer::class,
        ['elements' => ['arguments', 'arrays', 'match', 'parameters']],
    )
    ->withConfiguredRule(YodaStyleFixer::class, ['equal' => false, 'identical' => false, 'less_and_greater' => false])
    // Import
    ->withConfiguredRule(
        OrderedImportsFixer::class,
        ['sort_algorithm' => 'alpha', 'imports_order' => ['class', 'function', 'const']],
    )
    // Operator
    ->withConfiguredRule(IncrementStyleFixer::class, ['style' => 'post'])
    ->withConfiguredRule(NewWithParenthesesFixer::class, ['anonymous_class' => false])
    // PHPUnit
    ->withConfiguredRule(PhpUnitMethodCasingFixer::class, ['case' => 'snake_case'])
    // PHPDoc
    ->withConfiguredRule(PhpdocAlignFixer::class, ['align' => 'left'])
    ->withConfiguredRule(PhpdocOrderFixer::class, ['order' => ['param', 'return', 'throws']])
    ->withConfiguredRule(PhpdocTypesOrderFixer::class, ['null_adjustment' => 'always_last'])
    // Semicolon
    ->withConfiguredRule(MultilineWhitespaceBeforeSemicolonsFixer::class, ['strategy' => 'new_line_for_chained_calls'])
    // String Notation
    ->withConfiguredRule(StringImplicitBackslashesFixer::class, ['single_quoted' => 'escape'])
    // Whitespace
    ->withConfiguredRule(
        NoExtraBlankLinesFixer::class,
        [
            'tokens' => [
                'break',
                'curly_brace_block',
                'extra',
                'parenthesis_brace_block',
                'square_brace_block',
                'use',
                'switch',
                'case',
                'default',
            ],
        ],
    )
    ->withConfiguredRule(TypesSpacesFixer::class, ['space' => 'single', 'space_multiple_catch' => 'single'])
;
